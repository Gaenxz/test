<?php

namespace Magenest\Movie\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magenest\Movie\Model\ResourceModel\ShowDirector\CollectionFactory;

class DirectorId implements OptionSourceInterface
{
    private $collectionFactory;
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function toOptionArray()
    {
        $collection = $this->collectionFactory->create();
        $values = $collection->getData();
        foreach ($values as $value)
        {
            $director[] = ['label'=>$value['name'],'value'=>$value['director_id']];
        }
        return $director;
    }
}