<?php


namespace Magenest\Test\Block\Account;


use Magento\Framework\View\Element\Template;

class HistoryPoint extends Template
{
    public function getUrlHistoryPoint ()
    {
        return $this->getUrl('test/point/index');
    }
}
