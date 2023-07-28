<?php

namespace PaulReviewPage\Core\Content\Cms\Service;

use PaulReviewPage\Core\Content\Cms\Struct\ReviewPageItem;
use PaulReviewPage\Core\Content\Cms\Struct\ReviewPageItems;
use Shopware\Core\Content\Product\Aggregate\ProductReview\ProductReviewEntity;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Exception\InconsistentCriteriaIdsException;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\RangeFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Sorting\FieldSorting;

class ReviewPageService
{

    /**
     * @var EntityRepository
     */

    private $productReviewRepository;

    /**
     * ProductReviewPageService constructor.
     *
     * @param EntityRepository $productReviewRepository
     */

    public function __construct(EntityRepository $productReviewRepository)
    {

        $this->productReviewRepository = $productReviewRepository;

    }

    /**
     * @param Context $context
     * @param int $minRating
     * @param int $maxReviews
     *
     * @return ReviewPageItems
     *
     * @throws InconsistentCriteriaIdsException
     */

    public function getReviewPageItems($context, $minRating = 4, $maxReviews = 9)
    {

        $reviewPageItems = new ReviewPageItems();

        $productReviews = $this->getProductReviews($context, $minRating, $maxReviews);

        if (!empty($productReviews)) {

            /**
             * @var ProductReviewEntity $productReview
             */

            foreach ($productReviews as $productReview) {

                $product = $productReview->getProduct();


                if (!empty($product)) {

                    $reviewPageItem = new ReviewPageItem();

                    $reviewPageItem->setProduct($product);

                    $reviewPageItem->setComment($productReview->getContent());

                    $reviewPageItem->setOurComment($productReview->getComment());

                    $reviewPageItem->setName($productReview->getExternalUser());

                    $reviewPageItem->setDate($productReview->getCreatedAt());

                    $reviewPageItem->setPoints($productReview->getPoints());

                    $reviewPageItems->addItem($reviewPageItem);

                }

            }

        }

        return $reviewPageItems;

    }

    /**
     * Helper-function to get product reviews
     *
     * @param $context
     * @param int $minRating
     * @param \Shopware\Core\Framework\DataAbstractionLayer\Search\int $maxReviews
     *
     * @return ProductReviewEntity[]
     *
     * @throws InconsistentCriteriaIdsException
     */

    private function getProductReviews($context, $minRating, $maxReviews)
    {

        $productReviews = [];

        $criteria = new Criteria();

        $criteria->addAssociation('product');
        $criteria->addAssociation('product.media');
        $criteria->addAssociation('product.cover');

        $criteria->addFilter(
            new EqualsFilter('product_review.status', 1),
            new RangeFilter('product_review.points', ['gte' => $minRating])
        );

        $criteria->addSorting(
            new FieldSorting('product_review.createdAt', FieldSorting::DESCENDING)
        );

        $criteria->setLimit($maxReviews);

        $searchResult = $this->productReviewRepository->search($criteria, $context);

        if (!empty($searchResult)) {

            $productReviews = $searchResult->getElements();

        }

        return $productReviews;

    }

}
