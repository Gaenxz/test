<?php

namespace Magenest\Movie\Block\Adminhtml\InsertMovie;

use \Magento\Framework\App\ResourceConnection;
use Magento\Framework\View\Element\Template;

class Index extends Template
{
    protected $connection;
    protected $resource;

    public function __construct(Template\Context $context, ResourceConnection $resource, array $data = [])
    {
        $this->resource = $resource;
        $this->connection = $resource->getConnection();
        parent::__construct($context, $data);
    }

    public function insertMultiple($table,$data1,$data2,$data3,$data4,$data5)
    {
        $tableName = $this->resource->getTableName($table);
        $data=['0'=>array('movie_id'=>$data1,
            'name'=>$data2),
            'description'=>$data3,
            'rating'=>$data4,
            'director_id'=>$data5
        ];
        return $this->connection->insertMultiple($tableName,$data);
    }
}