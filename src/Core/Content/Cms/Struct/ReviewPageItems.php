<?php declare(strict_types=1);

namespace PaulReviewPage\Core\Content\Cms\Struct;

use Shopware\Core\Framework\Struct\Struct;

class ReviewPageItems extends Struct
{

    /**
     * @var ReviewPageItem[]
     */

    private $items = [];

    /**
     * @return ReviewPageItem[]
     */

    public function getItems()
    {

        return $this->items;

    }

    /**
     * @param $items
     */

    public function setItems($items)
    {

        $this->items = $items;

    }

    /**
     * @param $item
     */

    public function addItem($item)
    {

        $this->items[] = $item;

    }

}
