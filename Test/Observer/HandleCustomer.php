<?php


namespace Magenest\Test\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class HandleCustomer implements ObserverInterface
{
    protected $customerFactory;
    public function __construct(\Magento\Customer\Model\CustomerFactory $customerFactory)
    {
        $this->customerFactory = $customerFactory;
    }

    public function execute(Observer $observer)
    {
        $data = $observer->getCustomer();
        $model = $this->customerFactory->create()->load($data->getId());
        $model->setPointCustomer(50);
        $model->save();
        // TODO: Implement execute() method.
    }
}
