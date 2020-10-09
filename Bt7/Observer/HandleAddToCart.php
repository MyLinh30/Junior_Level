<?php


namespace Magenest\Bt7\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Serialize\Serializer\Json;

class HandleAddToCart implements ObserverInterface
{
    protected $request;
    protected $serializer;

    public function __construct(RequestInterface $request,
                                Json $serializer = null){
        $this->serializer = $serializer ?: \Magento\Framework\App\ObjectManager::getInstance()
            ->get(Json::class);
        $this->request = $request;
    }

    public function execute(Observer $observer)
    {
        if ($this->request->getFullActionName() == 'checkout_cart_add') { //checking when product is adding to cart
            $product = $observer->getData('product');
            $additionalOptions = [];
            $t = time();
            $additionalOptions[] = array(
                'label' => "Time Stamp: ",
                'value' => "$t",
            );
            $product->addCustomOption('additional_options', $this->serializer->serialize($additionalOptions));
        }
    }
}
