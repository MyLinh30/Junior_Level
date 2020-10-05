<?php


namespace Magenest\Test\Block;


use Magento\Framework\View\Element\Template;

class PointsCustomer extends Template
{
    protected $customerSession;
    public function __construct(Template\Context $context,\Magento\Customer\Model\Session $customerSession, array $data = [])
    {
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }
    public function getRewardPoint()
    {
        $customerData = $this->customerSession->getCustomer()->getData();
        if($customerData){
            return $customerData['point_customer'];
        }
        else{
            return 0;
        }

    }

}
