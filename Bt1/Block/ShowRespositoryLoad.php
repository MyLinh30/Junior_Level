<?php


namespace Magenest\Bt1\Block;


use Magento\Framework\View\Element\Template;

class ShowRespositoryLoad extends Template
{
    protected $ruleRespository;
    public function __construct(Template\Context $context,
                                \Magenest\Bt1\Model\RuleRepository $ruleRespository,
                                array $data = [])
    {
        $this->ruleRespository = $ruleRespository;
        parent::__construct($context, $data);
    }
    public function getRule(){
        $this->ruleRespository->getById(2);
        $this->ruleRespository->getById(4);
        $this->ruleRespository->deleteById(2);


    }

}
