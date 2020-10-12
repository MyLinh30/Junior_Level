<?php


namespace Magenest\Bt9\Observer;


use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Serialize\Serializer\Json;

class AddAdditionalOptions implements ObserverInterface
{
    protected $_request;
    public function __construct(RequestInterface $request, Json $serializer = null)
    {
        $this->_request = $request;
        $this->serializer = $serializer ?: \Magento\Framework\App\ObjectManager::getInstance()
            ->get(Json::class);
    }
    public function execute(Observer $observer)
    {
        if ($this->_request->getFullActionName() == 'checkout_cart_add')
        {
            $product = $observer->getData('product');
            $additionalOptions = [];
            $additionalOptions[] = array(
                'label' => "Message ",
                'value' => $this->_request->getParam('message'),
            );
            $product->addCustomOption('additional_options', $this->serializer->serialize($additionalOptions));
        }
    }
}
