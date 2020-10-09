<?php


namespace Magenest\Bt1\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
class Save extends \Magento\Backend\App\Action
{
    protected $ruleRespository;
    protected $ruleInterface;
    public function __construct(Action\Context $context,
                                \Magenest\Bt1\Api\Data\RuleInterface $ruleInterface,
                                \Magenest\Bt1\Api\RuleRepositoryInterface $ruleRespository)
    {
        $this->ruleRespository = $ruleRespository;
        $this->ruleInterface = $ruleInterface;
        parent::__construct($context);
    }
    public function execute()
    {
        $post[] = ['id'=>2,'title'=> 'BT', 'status'=> null, 'rule_type'=> null, 'conditions_serialized'=> 'bt'];
        $this->ruleInterface = $this->ruleRespository->getById($post[0]['id']);
        $this->ruleInterface->setTitle($post[0]['title']);
        $this->ruleRespository->save($this->ruleInterface);
    }
}
