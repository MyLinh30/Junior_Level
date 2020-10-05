<?php


namespace Magenest\Bt1\Block;


use Magento\Framework\View\Element\Template;

class ItemPending extends Template
{
    protected $ruleCollectionFactory;
    public function __construct(Template\Context $context,
                                \Magenest\Bt1\Model\ResourceModel\Rule\CollectionFactory $ruleCollectionFactory,
                                array $data = [])
    {
        $this->ruleCollectionFactory = $ruleCollectionFactory;
        parent::__construct($context, $data);
    }
    public function getRuleStatusPending ()
    {
        $collection = $this->ruleCollectionFactory->create();
        return $collection->getItems();
    }
}
