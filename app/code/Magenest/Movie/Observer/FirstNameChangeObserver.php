<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class FirstNameChangeObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $observer->getCustomer()->setData('firstname','Magenest');
    }
}