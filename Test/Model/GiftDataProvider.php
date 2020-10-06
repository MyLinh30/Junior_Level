<?php


namespace Magenest\Test\Model;


use Magento\Ui\DataProvider\AbstractDataProvider;


class GiftDataProvider extends AbstractDataProvider
{
    protected $_loadedData;
    protected $_storeManager;

    public function __construct($name,
                                $primaryFieldName,
                                \Magento\Store\Model\StoreManagerInterface $storeManager,
                                \Magenest\Test\Model\ResourceModel\Gift\CollectionFactory $collectionFactory,
                                $requestFieldName,
                                array $meta = [],
                                array $data = [])
    {
        $this->_storeManager = $storeManager;
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        if (isset($this->_loadedData)){
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $model) {
            $this->_loadedData[$model->getId()] = $model->getData();
            if ($model->getUrl()) {
                $m['url'][0]['name'] = $model->getUrl();
                $m['url'][0]['url'] = $this->getMediaUrl().$model->getUrl();
                $fullData = $this->_loadedData;
                $this->_loadedData[$model->getId()] = array_merge($fullData[$model->getId()], $m);
            }
        }
        return $this->_loadedData;
    }
    public function getMediaUrl()
    {
        $mediaUrl = $this->_storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'/test/tmp/feature/';
        return $mediaUrl;
    }
}
