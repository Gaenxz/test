<?php

namespace Magenest\Movie\Controller\FrontendTest;

class FEtest extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}