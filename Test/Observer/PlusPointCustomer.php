<?php


namespace Magenest\Test\Observer;


use Magenest\Test\Model\HistoryPoint;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class PlusPointCustomer implements ObserverInterface
{
    protected $customerSession;
    protected $customerFactory;
    protected $productFactory;
    protected $historyPointFactory;
    public function __construct(\Magento\Customer\Model\Session $customerSession,
                                \Magenest\Test\Model\HistoryPointFactory $historyPointFactory,
                                \Magento\Catalog\Model\ProductFactory $productFactory,
                                \Magento\Customer\Model\CustomerFactory $customerFactory)
    {
        $this->customerSession = $customerSession;
        $this->customerFactory = $customerFactory;
        $this->productFactory = $productFactory;
        $this->historyPointFactory = $historyPointFactory;
    }

    public function execute(Observer $observer)
    {
        $data = $observer->getOrder();
        $customerData = $this->customerSession->getCustomer()->getId();
        $historyModel = $this->historyPointFactory->create();
        $total = 0;
        foreach ($data->getItems() as $item){
             $productModel = $this->productFactory->create()->load($item->getProductId());
             $total += $productModel->getPointProduct();
        }
        $model = $this->customerFactory->create()->load($customerData);
        $currentPoint = $model->getPointCustomer();
        $model->setPointCustomer($currentPoint + $total);
        $model->save();

        $historyModel->setCustomerId($customerData);
        $historyModel->setPoint($model->getPointCustomer());
        $historyModel->setTime(date("Y/m/d"));
        $historyModel->save();
        // TODO: Implement execute() method.
    }
}
