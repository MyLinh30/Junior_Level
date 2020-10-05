<?php


namespace Magenest\Bt1\Model\ResourceModel;


class Rule extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('magenest_rules','id');
    }
}
