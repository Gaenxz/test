<?php

namespace Magenest\Movie\Model\Config\Backend;


use Magenest\Movie\Model\ResourceModel\ShowActor\CollectionFactory;

class Rowsactor extends \Magento\Framework\App\Config\Value
{

    private $_collectionFactory;

    public function __construct(
                                CollectionFactory $collectionFactory,
                                \Magento\Framework\Model\Context $context,
                                \Magento\Framework\Registry $registry,
                                \Magento\Framework\App\Config\ScopeConfigInterface $config,
                                \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
                                \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
                                \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
                                array $data = []
    )
    {
        $this->_collectionFactory=$collectionFactory;
        parent::__construct($context,$registry,$config,$cacheTypeList,$resource,$resourceCollection,$data);
    }

    public function afterLoad()
    {
        $collection = $this->_collectionFactory->create();
        $value=$collection->addFieldToSelect('actor_id')->getSize();
        $this->setValue($value);
        parent::afterLoad();
    }
}