<?php


namespace Magenest\Test\Block;


use Magenest\Test\Model\HistoryPointFactory;
use Magento\Framework\View\Element\Template;

class HistoryPointCustomer extends Template
{
    protected $customerSession;
    protected $historyPointCollectionFactory;
    public function __construct(Template\Context $context,
                                \Magenest\Test\Model\ResourceModel\HistoryPoint\CollectionFactory $historyPointCollectionFactory,
                                \Magento\Customer\Model\Session $customerSession,
                                array $data = [])
    {
        $this->customerSession = $customerSession;
        $this->historyPointCollectionFactory = $historyPointCollectionFactory;
        parent::__construct($context, $data);
    }
    public function getHistoryPointCustomerLogin()
    {
        $customerData = $this->customerSession->getCustomer()->getId();
        $collection = $this->historyPointCollectionFactory->create();
        $collection->addFieldToFilter('customer_id', $customerData);
        return $collection->getItems();


    }

}
