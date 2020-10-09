<?php


namespace Magenest\Bt8\Controller\MyController;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Index extends Action
{
    protected $resultPageFactory;
    protected $myInterface;
    public function __construct(Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory,
                                \Magenest\Bt8\Api\MyInterface $myInterface)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->myInterface = $myInterface;
        parent::__construct($context);
    }

    public function execute()
    {
       return $this->myInterface->foo();
    }
}
