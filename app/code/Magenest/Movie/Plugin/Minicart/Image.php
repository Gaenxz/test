<?php

namespace Magenest\Movie\Plugin\Minicart;

use Magento\Quote\Model\Quote\Item;

class Image
{
    public function aroundGetItemData($subject, $proceed, Item $item)
    {
        $result = $proceed($item);
        $children = $item->getChildren();
        $childrenItems= $proceed(reset($children));
        $result['product_image']['src'] = $childrenItems['product_image']['src'];
        $result['product_name'] = $childrenItems['product_name'];
//        $result['options'][0]['value'];
        return $result;
    }
}