<?php

namespace Magenest\Movie\Block\Adminhtml;

class ShowDirector extends
    \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_Movie';
        $this->_controller = 'adminhtml_ShowDirector';
        parent::_construct();
        $this->buttonList->remove('add');
    }
}