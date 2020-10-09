<?php


namespace Magenest\Bt8\Controller\MyController;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Another extends Action
{
    protected $myInterface;
    public function __construct(Context $context,
                                \Magenest\Bt8\Api\MyInterface $myInterface)
    {
        $this->myInterface = $myInterface;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->myInterface->foo();
        // TODO: Implement execute() method.
    }
}
