<?php


namespace Magenest\Test\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class HandleCustomer implements ObserverInterface
{
    protected $customerFactory;
    protected $scopeConfig;
    public function __construct(\Magento\Customer\Model\CustomerFactory $customerFactory,
                                \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
        $this->customerFactory = $customerFactory;
    }

    public function execute(Observer $observer)
    {
        $data = $observer->getCustomer();
        $model = $this->customerFactory->create()->load($data->getId());
        $model->setPointCustomer($this->scopeConfig->getValue('point_default/general/show', \Magento\Store\Model\ScopeInterface::SCOPE_STORE));
        $model->save();
        // TODO: Implement execute() method.
    }
}
