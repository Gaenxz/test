<?php

namespace Magenest\Movie\Controller\Adminhtml\InsertMovie;

use Magenest\Movie\Model\ResourceModel\ShowMovie\CollectionFactory;
use Magento\Backend\App\Action\Context;
use \Magento\Framework\App\ResourceConnection;
//use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
//    protected $resultPageFactory;
    protected $collectionFactory;
    protected $connection;
    protected $resource;


    public function __construct(Context $context,CollectionFactory $collectionFactory,ResourceConnection $resource)
    {
//        $this->resultPageFactory=$resultPageFactory;
        $this->resource = $resource;
        $this->connection = $resource->getConnection();
        $this->collectionFactory=$collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
//        $resultPage = $this->resultPageFactory->create();
        $collection = $this->collectionFactory->create();
        $movie=$this->getRequest()->getParam('movie');
//        $data_name = $movie['movie_name'];
//        $data_desciption = $movie['movie_desciption'];
//        $data_rating = $movie['movie_rating'];
//        $data_director_id = $movie['movie_director_id'];
        if(isset( $movie['movie_name'],
            $movie['movie_description'],
            $movie['movie_rating'],
            $movie['movie_director_id']))
        {
            $this->insertMultiple('magenest_movie',
                $movie['movie_name'],
                $movie['movie_description'],
                $movie['movie_rating'],
                $movie['movie_director_id']);
            $this->_redirect('movie/showmovie');
        }
//        return $resultPage;
    }

    public function insertMultiple($table,$data1,$data2,$data3,$data4)
    {
        $tableName = $this->resource->getTableName($table);
        $data = ['add'=>array(
            'movie_id'=>null,
            'name'=>$data1,
            'description'=>$data2,
            'rating'=>$data3,
            'director_id'=>$data4
            )];
        return $this->connection->insertMultiple($tableName,$data);
    }
}