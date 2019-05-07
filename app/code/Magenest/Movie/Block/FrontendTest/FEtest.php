<?php

namespace Magenest\Movie\Block\FrontendTest;

use Magento\Framework\View\Element\Template;

class FEtest extends Template
{
    /**
     * @var string
     */
    protected $_template = 'Magenest_Movie::frontendtest/fe_test.phtml';

    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }
}