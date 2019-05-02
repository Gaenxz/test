<?php

namespace Magenest\Movie\Setup;


use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetup;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Eav\Model\Config;

class UpgradeData implements UpgradeDataInterface
{
    private $customerSetupFactory;
    private $eavSetupFactory;
    private $eavConfig;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig
    )
    {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->eavConfig=$eavConfig;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.1.9_') < 0) {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
            $entityTypeId = $customerSetup->getEntityTypeId(Customer::ENTITY);
            $customerSetup->addAttribute(
                $entityTypeId,
                'avatar', array(
                'type' => 'varchar',
                'label' => 'Logo Image',
                'input' => 'image',
                'required' => false,
                'visible'      => true,
                'user_defined' => true,
                'position'     => 100,
                'system'       => 0,
            ));
            //  used_in_forms are of these types you can use forms key according to your need ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address', 'customer_account_create']
            $eavSetup->addAttributeToSet(
                CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
                CustomerMetadataInterface::ATTRIBUTE_SET_ID_CUSTOMER,
                null,
                'avatar');
            $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'avatar')
            ->addData(
                ['used_in_forms'=>
                 ['adminhtml_customer','customer_account_create','customer_account_edit']]
            )->save();
        }
    }
}