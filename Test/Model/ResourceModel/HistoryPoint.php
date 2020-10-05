<?php


namespace Magenest\Test\Model\ResourceModel;


class HistoryPoint extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('magenest_history_point','id');
        // TODO: Implement _construct() method.
    }
}
