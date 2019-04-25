<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class PingPong implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $check = $observer->getDataByKey('check');
        if($check['value']=="Ping")
            $check->setData('value',"Pong");
        return $this;
    }
}