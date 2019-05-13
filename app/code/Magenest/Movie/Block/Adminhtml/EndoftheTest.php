<?php

namespace Magenest\Movie\Block\Adminhtml;

use Magento\Framework\View\Element\Template;

class EndoftheTest extends Template
{
    protected $_fullmoduleList;
    protected $_customerCollectionFactory;
    protected $_productCollectionFactory;
    protected $_orderCollectionFactory;
    protected $_invoiceCollectionFactory;
    protected $_creditmemoCollectionFactory;

    public function __construct(
        Template\Context $context, array $data = [],
        \Magento\Framework\Module\FullModuleList $fullModuleList,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        \Magento\Sales\Model\ResourceModel\Order\Invoice\CollectionFactory $invoiceCollectionFactory,
        \Magento\Sales\Model\ResourceModel\Order\Creditmemo\CollectionFactory $creditmemoCollectionFactory
    )
    {
        parent::__construct($context, $data);
        $this->_fullmoduleList = $fullModuleList;
        $this->_customerCollectionFactory = $customerCollectionFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_orderCollectionFactory = $orderCollectionFactory;
        $this->_invoiceCollectionFactory = $invoiceCollectionFactory;
        $this->_creditmemoCollectionFactory = $creditmemoCollectionFactory;
    }

    public function moduleNumber()
    {
        $allModules = $this->_fullmoduleList->getAll();
        $count = 0;
        foreach ($allModules as $module)
        {
            if(strpos($module['name'],'Magento') === false)
                $count++;
        }
        return $count;
    }

    public function customerNumber()
    {
        $collection = $this->_customerCollectionFactory->create();
        $customers = $collection->getData();
        $count = 0;
        foreach ($customers as $customer)
        {
            $count++;
        }
        return $count;
    }

    public function productNumber()
    {
        $collection = $this->_productCollectionFactory->create();
        $products = $collection->getData();
        $count = 0;
        foreach ($products as $product)
        {
            $count++;
        }
        return $count;
    }

    public function orderNumber()
    {
        $collection = $this->_orderCollectionFactory->create();
        $orders = $collection->getData();
        $count = 0;
        foreach ($orders as $order)
        {
            $count++;
        }
        return $count;
    }

    public function invoiceNumber()
    {
        $collection = $this->_invoiceCollectionFactory->create();
        $invoices = $collection->getData();
        $count = 0;
        foreach ($invoices as $invoice)
        {
            $count++;
        }
        return $count;
    }

    public function creditmemoNumber()
    {
        $collection = $this->_creditmemoCollectionFactory->create();
        $creditmemos = $collection->getData();
        $count = 0;
        foreach ($creditmemos as $creditmemo)
        {
            $count++;
        }
        return $count;
    }
}