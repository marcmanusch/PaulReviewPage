<?php

namespace PaulReviewPage\Core\Content\Cms\DataResolver\Element;

use PaulReviewPage\Core\Content\Cms\Service\ReviewPageService;
use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;
use Shopware\Core\Content\Cms\DataResolver\CriteriaCollection;
use Shopware\Core\Content\Cms\DataResolver\Element\AbstractCmsElementResolver;
use Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext;
use Shopware\Core\Framework\DataAbstractionLayer\Exception\InconsistentCriteriaIdsException;

class ReviewPageCmsElementResolver extends AbstractCmsElementResolver
{

    /**
     * @var ReviewPageService
     */

    private $reviewPageService;

    /**
     * ReviewPageCmsElementResolver constructor.
     *
     * @param ReviewPageService $reviewPageService
     */

    public function __construct(ReviewPageService $reviewPageService)
    {

        $this->reviewPageService = $reviewPageService;

    }

    /**
     * @return string
     */

    public function getType(): string
    {

        return 'review-page';

    }

    /**
     * @param CmsSlotEntity $slot
     * @param ResolverContext $resolverContext
     *
     * @return CriteriaCollection|null
     */

    public function collect(CmsSlotEntity $slot, ResolverContext $resolverContext): ?CriteriaCollection
    {

        return null;

    }

    /**
     * @param CmsSlotEntity $slot
     * @param ResolverContext $resolverContext
     * @param ElementDataCollection $result
     */

    public function enrich(CmsSlotEntity $slot, ResolverContext $resolverContext, ElementDataCollection $result): void
    {

        try {

            $configuration = $slot->getConfig();

            $reviewPageItems = $this->reviewPageService->getReviewPageItems(
                $resolverContext->getSalesChannelContext()->getContext(),
                (int) $configuration['minRating']['value'],
                (int) $configuration['maxReviews']['value']
            );

            $slot->setData($reviewPageItems);

        } catch (InconsistentCriteriaIdsException $e) {

            /**
             * unable to build review page
             */

        }

    }

}
