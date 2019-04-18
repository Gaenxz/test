<?php

namespace Magenest\Movie\Block\Adminhtml;

class ShowActor extends
    \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_Movie';
        $this->_controller = 'adminhtml_ShowActor';
        parent::_construct();
        $this->buttonList->remove('add');
    }
}