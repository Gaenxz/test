<?php

namespace Magenest\Movie\UI\Component\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class OderGrid extends Column
{
    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if(isset($dataSource['data']['items']))
        {
            foreach ($dataSource['data']['items'] as &$item) //thang item chua du lieu cua 1 hang co trong 1 order
            {
                if($item['increment_id'] % 2 != 0) //goi thang order id ra
                    $item['newcolumn'] = '<span class="grid-severity-critical">Odd</span>';
                else
                    $item['newcolumn'] = '<span class="grid-severity-notice">Even</span>';// set du lieu cho thang new column
            }
        }
        return $dataSource;
    }
}
