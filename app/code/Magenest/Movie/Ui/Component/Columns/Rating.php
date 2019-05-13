<?php

namespace Magenest\Movie\UI\Component\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Rating extends Column
{
    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if(isset($dataSource['data']['items']))
        {
            foreach ($dataSource['data']['items'] as &$item)
            {
                if (array_key_exists('rating', $item))
                {
                    $html = "";
                    for($i = 1; $i <= 10; $i++)
                    {
                        if($i <= $item[$this->getName()]) //debug thay $this co cai data ten la Name chua ten duoc khai bao o file xml
                            $html = $html . "<span class='fa fa-star checked'></span>";
                        else
                            $html=$html . "<span class='fa fa-star'></span>";
                    }
                    $item[$this->getName()] = $html;
//                    switch ($item[$this->getName()])
//                    {
//                        case 1:
//                            $tmp = 0;
//                            $html= "";
//                            for ($i = 1;$i<5;$i++)
//                            {
//                                $tmp++;
//                                if($tmp==1)
//                                    $html=$html."<span class='fa fa-star checked'></span>";
//                                else
//                                    $html=$html."<span class='fa fa-star'></span>";
//                            }
//                            $item[$this->getName()] = $html;
//                    };
//                        =html_entity_decode('asdasdadd');
                }
            }
        }

        return $dataSource;
    }
}