<?php


namespace Magenest\Bt2\Block\Adminhtml;


use Magento\Framework\View\Element\Template;

class ChangeColor extends Template
{
    protected $scopeConfig;
    public function __construct(Template\Context $context,
                                \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
                                array $data = [])
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }
    public function getValueClockText(){
        return $this->scopeConfig->getValue('clock/clockconfiguration/text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

}
