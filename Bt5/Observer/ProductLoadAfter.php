<?php


namespace Magenest\Bt5\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ProductLoadAfter implements ObserverInterface
{

    public function execute(Observer $observer)
    {
        $data = $observer->getProduct();
        $customAttribute = $data->getCustomAttributeVarchar();
        $str = substr($customAttribute,0, (strpos($customAttribute,"varchar"))-1);
        $data->setCustomAttributeVarchar($str);

    }
}
