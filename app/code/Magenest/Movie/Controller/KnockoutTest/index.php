<?php

namespace Magenest\Movie\Controller\KnockoutTest;

class index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}