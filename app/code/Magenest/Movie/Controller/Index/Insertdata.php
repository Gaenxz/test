<?php

namespace Magenest\Movie\Controller\Index;

use Magento\Framework\App\Action\Context;
use \Magento\Framework\App\ResourceConnection;

class Insertdata extends \Magento\Framework\App\Action\Action
{
    protected $connection;
    protected $resource;

    public function __construct(Context $context,ResourceConnection $resource)
    {
        $this->resource = $resource;
        $this->connection = $resource->getConnection();
        parent::__construct($context);
    }


    public function insertMultiple($table,$data)
    {
        $tableName = $this->resource->getTableName($table);
        return $this->connection->insertMultiple($tableName,$data);
    }

    public function execute()
    {
//        for($i=0;$i<10;$i++)
//        {
//            $actorData = ['name' => 'Loc'.$i];
//            $directorData = ['name' => 'Loc'.$i];
//            $this->insertMultiple('magenest_actor', $actorData);
//            $this->insertMultiple('magenest_director', $directorData);
//        }

//        for($i=1;$i<=8;$i++)
//        {
//            $movieData = ['$i'=>array('name' => 'Loc'.$i,'description'=>'abc'.$i,'rating'=>'100','director_id'=>$i)];
//            $actormovieData = ['add' => array('movie_id'=>$i,'actor_id'=>$i)];
//            $this->insertMultiple('magenest_movie', $movieData);
//            $this->insertMultiple('magenest_movie_actor', $actormovieData);
//        }
        $this->insertMultiple('magenest_movie',['add'=>array(
            'movie_id'=>null,
            'name'=>'fasdfasf',
            'description'=>'fasfasfas',
            'rating'=>12,
            'director_id'=>2
        )]);
        $this->getResponse()->setBody('success');

    }
}