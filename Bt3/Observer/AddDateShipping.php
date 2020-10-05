<?php


namespace Magenest\Bt3\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Serialize\Serializer\Json;

class AddDateShipping implements ObserverInterface
{
    private $_request;
    private $json;

    public function __construct(
        RequestInterface $request,
        Json $json
    ){
        $this->json = $json;
        $this->_request = $request;
    }
    public function execute(Observer $observer)
    {
        $post = $this->_request->getPostValue();
        if(isset($post['date_shipping']) &&$post['date_shipping']!=""){
            $dateShipping = $post['date_shipping'];
            $product = $observer->getProduct();
            $additionalOptions = [];
            $additionalOptions[] = [
                'label' => "Date Shipping",
                'value' => "$dateShipping",
            ];
            $observer->getData()['item']->getOptions()[0]->setCode("additional_options");
            $observer->getData()['item']->getOptions()[0]->setValue($this->json->serialize($additionalOptions));
        }
        return $observer;
    }
}
