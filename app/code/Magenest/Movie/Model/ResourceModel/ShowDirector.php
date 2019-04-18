<?php

namespace Magenest\Movie\Model\ResourceModel;

class ShowDirector extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_director','director_id');
    }
}