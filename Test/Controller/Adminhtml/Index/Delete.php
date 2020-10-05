<?php


namespace Magenest\Test\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Delete extends \Magento\Backend\App\Action
{
    protected $giftFactory;
    public function __construct(Action\Context $context,
                                \Magenest\Test\Model\GiftFactory $giftFactory)
    {
        $this->giftFactory = $giftFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->giftFactory->create()->load($id);
        $model->delete();
        $this->messageManager->addSuccess('Delete GIFT SUCCESS!');
        $this->_redirect('test/index/index');

    }
}
