<?php declare(strict_types=1);

namespace PaulReviewPage\Core\Content\Cms\Struct;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\Struct\Struct;

class ReviewPageItem extends Struct
{

    /**
     * @var string
     */

    private $comment;

    /**
     * @var string
     */

    private $ourComment;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTimeInterface
     */
    private $date;

    /**
     * @var float
     */

    private $points;

    /**
     * @var ProductEntity|null
     */

    private $product;

    /**
     * @return string
     */


    public function getName()
    {

        return $this->name;

    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->date;
    }


    public function getComment()
    {

        return $this->comment;

    }

    public function getOurComment()
    {

        return $this->ourComment;

    }

    /**
     * @param $name
     */
    public function setName($name)
    {

        $this->name = $name;
    }


    /**
     * @param $date
     */
    public function setDate($date)
    {

        $this->date = $date;
    }

    /**
     * @param $comment
     */

    public function setComment($comment)
    {

        $this->comment = $comment;

    }

    /**
     * @param $ourComment
     */
    public function setOurComment($ourComment)
    {

        $this->ourComment = $ourComment;

    }

    /**
     * @return float
     */

    public function getPoints()
    {

        return $this->points;

    }

    /**
     * @param $points
     */

    public function setPoints($points)
    {

        $this->points = $points;

    }

    /**
     * @return ProductEntity|null
     */

    public function getProduct()
    {

        return $this->product;

    }

    /**
     * @param $product
     */

    public function setProduct($product)
    {

        $this->product = $product;

    }

}
