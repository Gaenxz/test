<?php

namespace Magenest\Movie\Controller\Index;

class Getdata extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
//        $output = '';
//        $output = $collection->__toString();
//        foreach($collection as $collect)
//        {
//            $output.=$collect['movie_id']."<br/>";
//        }
//        $this->getResponse()->setBody($output);
    }
}