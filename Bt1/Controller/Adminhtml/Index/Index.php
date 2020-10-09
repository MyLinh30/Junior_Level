<?php


namespace Magenest\Bt1\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(Action\Context $context,
                                \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->resultPageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $page = $this->resultPageFactory->create();
        $page->getConfig()->getTitle()->prepend(__('RULE GRID'));
        return $page;
    }
}
