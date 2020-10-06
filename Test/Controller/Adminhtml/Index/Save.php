<?php


namespace Magenest\Test\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Save extends \Magento\Backend\App\Action
{
    protected $imageUploader;
    protected $giftFactory;
    public function __construct(Action\Context $context,\Magenest\Test\Model\GiftFactory $giftFactory )
    {
        $this->giftFactory = $giftFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $model = $this->giftFactory->create();
        if($data['id']){
            $model->load($data['id']);
            $model->setName($data['name']);
            $model->setUrl($data['url'][0]['name']);
            $model->setDescription($data['description']);
            $model->save();
        }
        else{
            $model->setName($data['name']);
            $model->setUrl($data['url'][0]['name']);
            $model->setDescription($data['description']);
            $model->save();
        }

        $this->messageManager->addSuccess('Save Success');
        $this->_redirect('test/index/index');
        // TODO: Implement execute() method.
    }
}
