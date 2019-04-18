<?php

namespace Magenest\Movie\Block\Adminhtml\ShowMovie;

use Magento\Backend\Block\Widget\Grid as WidgetGrid;

class Grid extends
    \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magenest\Movie\Model\ResourceModel\ShowMovie\Collection
     */
    protected $_movieCollection;
    /**
     * @param \Magento\Backend\Block\Template\Context
    $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Magenest\Movie\Model\ResourceModel\ShowMovie\Collection $movieCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magenest\Movie\Model\ResourceModel\ShowMovie\Collection $movieCollection,
        array $data = []
    ) {
        $this->_movieCollection = $movieCollection;
        parent::__construct($context, $backendHelper,
            $data);
        $this->setEmptyText(__('No Movie Found'));
    }
    /**
     * Initialize the movie collection
     *
     * @return WidgetGrid
     */
    protected function _prepareCollection()
    {
        $this->setCollection($this->_movieCollection);
        return parent::_prepareCollection();
    }

    /**
     * Prepare grid columns
     *
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'movie_id',
            [
                'header'=>__('ID'),
                'index'=>'movie_id'
            ]
        );
        $this->addColumn(
            'movie_name',
            [
                'header'=>__('Name'),
                'index'=>'name'
            ]
        );
        $this->addColumn(
            'movie_description',
            [
                'header'=>__('Description'),
                'index'=>'description'
            ]
        );
        $this->addColumn(
            'movie_rating',
            [
                'header'=>__('Rating'),
                'index'=>'rating'
            ]
        );
        $this->addColumn(
            'movie_director_id',
            [
                'header'=>__('Director ID'),
                'index'=>'director_id'
            ]
        );

        return $this;
    }
}