<?php

namespace Magenest\Movie\Block\Account\Dashboard;

use Magento\Framework\View\Element\Template;

class CustomerImage extends \Magento\Framework\View\Element\Template
{
    protected $currentCustomer;
    protected $sessionFactory;
    protected $_storeManager;

    function __construct(
        Template\Context $context,
        \Magento\Customer\Model\SessionFactory $sessionFactory,
        \Magento\Store\Model\StoreManagerInterface $_storeManager,
        array $data = []
    )
    {
        $this->sessionFactory= $sessionFactory;
        $this->_storeManager = $_storeManager;
        parent::__construct($context, $data);
    }

    public function getCustomer()
    {
        $sessionModel = $this->sessionFactory->create();
        $customer = $sessionModel->getCustomer();
        $address = $customer->getAddresses();
        $phone = $address[1]->getData('telephone');
        $data = ['Avatar'=>$customer->getData('avatar'),
            'Name'=>$customer->getName(),
            'Email'=>$customer->getEmail(),
            'Phone'=>$phone];
        return $data;
    }

    public function getBaseUrl()
    {
        return parent::getBaseUrl();
    }
}