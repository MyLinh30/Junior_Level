<?php


namespace Magenest\Bt2\Block;


use Magento\Framework\View\Element\Template;

class CountDownHeader extends Template
{
    protected $scopeConfig;
    public function __construct(Template\Context $context,
                                \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
                                array $data = [])
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }
    public function getValueClockColor(){
        return $this->scopeConfig->getValue('clock/clockconfiguration/color', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    public function getValueClockTitle(){
        return $this->scopeConfig->getValue('clock/clockconfiguration/title', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    public function getValueClockText(){
        return $this->scopeConfig->getValue('clock/clockconfiguration/text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }


}
