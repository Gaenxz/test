<?php

namespace Magenest\Movie\Model\Config\Backend;

class PingPongEvent extends \Magento\Framework\App\Config\Value
{
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Config\ScopeConfigInterface $config,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    )
    {
        parent::__construct($context,$registry,$config,$cacheTypeList,$resource,$resourceCollection,$data);
    }

    public function beforeSave()
    {
        $data = new \Magento\Framework\DataObject(['value'=>$this->getValue()]);
        $this->_eventManager->dispatch('ping_pong',['check'=>$data]);
        $this->setValue($data['value']);
        parent::beforeSave();
    }
}