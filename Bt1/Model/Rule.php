<?php


namespace Magenest\Bt1\Model;


use Magenest\Bt1\Api\Data\RuleInterface;

class Rule extends \Magento\Framework\Model\AbstractModel implements RuleInterface
{
    public function __construct(\Magento\Framework\Model\Context $context,
                                \Magento\Framework\Registry $registry,
                                \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
                                \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
                                array $data = [])
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    public function _construct()
    {
        $this->_init('Magenest\Bt1\Model\ResourceModel\Rule');
    }

    public function getTitle()
    {
       return $this->getData(self::TITLE);
    }

    public function setTitle($name)
    {
        return $this->getData(self::TITLE, $name);
    }
}
