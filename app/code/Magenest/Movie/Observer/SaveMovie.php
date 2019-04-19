<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SaveMovie implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $rating=$observer->getDataByKey('rating');
        $rating->setData('movie_rating',0);
        return $this;
    }
}