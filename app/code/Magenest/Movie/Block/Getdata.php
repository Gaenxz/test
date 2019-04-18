<?php

namespace Magenest\Movie\Block;

use Magenest\Movie\Model\ResourceModel\ShowActor\CollectionFactory;
use Magento\Framework\View\Element\Template;

class Getdata extends Template
{
    private $_collectionFactory;

    public function __construct(Template\Context $context, array $data = [],CollectionFactory $collectionFactory)
    {
        parent::__construct($context, $data);
        $this->_collectionFactory=$collectionFactory;
    }

    public function get_data()
    {
        $collection = $this->_collectionFactory->create();
        $collection->getSelect()
            ->from('magenest_movie_actor','movie_id')
            ->from('magenest_movie',array('name as movie_name','rating','description'))
            ->from('magenest_director','name as director_name')
            ->where('main_table.actor_id=magenest_movie_actor.actor_id
            and magenest_movie_actor.movie_id=magenest_movie.movie_id 
            and magenest_movie.director_id = magenest_director.director_id')
            ->group('main_table.name');

//        $collection->getSelect()->__toString();
//        echo $collection->getSelect();

        return $collection;
    }
}