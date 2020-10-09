<?php


namespace Magenest\Bt1\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ChangeModelRule implements ObserverInterface
{
    protected $ruleRespository;
    public function __construct(\Magenest\Bt1\Model\RuleRepository $ruleRespository)
    {
        $this->ruleRespository = $ruleRespository;
    }

    public function execute(Observer $observer)
    {
        $data = $observer->getData('rule');
        $respsitory = $this->ruleRespository->getById($data['id']);
        $respsitory->setTitle('Ban da doi Title thanh cong');
        // TODO: Implement execute() method.
    }
}
