<?php

namespace Magenest\Movie\Block\Adminhtml\ShowDirector;

use Magento\Backend\Block\Widget\Grid as WidgetGrid;

class Grid extends
    \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magenest\Movie\Model\ResourceModel\ShowDirector\Collection
     */
    protected $_directorCollection;
    /**
     * @param \Magento\Backend\Block\Template\Context
    $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Magenest\Movie\Model\ResourceModel\ShowDirector\Collection $directorCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magenest\Movie\Model\ResourceModel\ShowDirector\Collection $directorCollection,
        array $data = []
    ) {
        $this->_directorCollection = $directorCollection;
        parent::__construct($context, $backendHelper,
            $data);
        $this->setEmptyText(__('No Director Found'));
    }
    /**
     * Initialize the actor collection
     *
     * @return WidgetGrid
     */
    protected function _prepareCollection()
    {
        $this->setCollection($this->_directorCollection);
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
            'director_id',
            [
                'header'=>__('ID'),
                'index'=>'director_id'
            ]
        );
        $this->addColumn(
            'director_name',
            [
                'header'=>__('Name'),
                'index'=>'name'
            ]
        );

        return $this;
    }
}