<?php


namespace Magenest\Test\Model\ResourceModel;


class Gift extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('magenest_gift','id');
        // TODO: Implement _construct() method.
    }
}
