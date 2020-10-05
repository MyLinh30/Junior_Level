<?php


namespace Magenest\Test\Controller\Adminhtml\Index;


use Magenest\Test\Model\ResourceModel\Gift\Collection;
use Magenest\Test\Model\ResourceModel\Gift\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    protected $_filter;
    protected $giftCollectionFactory;
    protected $resultFactory;
    public function __construct(Action\Context $context,
                                \Magento\Ui\Component\MassAction\Filter $_filter,
                                CollectionFactory $giftCollectionFactory)
    {
        $this->_filter = $_filter;
        $this->giftCollectionFactory = $giftCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {

        $result = $this->giftCollectionFactory->create();
        $collection = $this->_filter->getCollection($result);
        $collectionSize = $collection->getSize();
        foreach ($collection as $item){
            $item->delete();
        }
        $this->messageManager->addSuccess(__('A total of %1 element(s) have been deleted.'.$collectionSize));
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $redirect->setPath('test/index/index');

    }
}
