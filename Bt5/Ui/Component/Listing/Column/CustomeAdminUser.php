<?php


namespace Magenest\Bt5\Ui\Component\Listing\Column;


use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;


class CustomeAdminUser extends Column
{
    protected $authSession;
    protected $productCollectionFactory;
    protected $productFactory;
    public function __construct(ContextInterface $context,
                                \Magento\Catalog\Model\ProductFactory $productFactory,
                                \Magento\Backend\Model\Auth\Session $authSession,
                                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
                                UiComponentFactory $uiComponentFactory,
                                array $components = [],
                                array $data = [])
    {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->authSession = $authSession;
        $this->productFactory = $productFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepare()
    {
        $adminUser = $this->authSession->getUser();
        $data = $adminUser->getData('firstname');
        $firstString= strtoupper($data[0]);
        if(strcmp($firstString,"A")>=0 && strcmp($firstString,"M")<=0){
            $this->_data['config']['componentDisabled'] = false;
        }else{
            $this->_data['config']['componentDisabled'] = true;
        }
        parent::prepare(); // TODO: Change the autogenerated stub
    }
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])){
            foreach ($dataSource['data']['items'] as &$item){
                 $model = $this->productFactory->create()->load($item['entity_id']);
                 $item["custom_attribute"]=$model->getCustomAttributeVarchar()? $model->getCustomAttributeVarchar() :"";
                $item[$this->getData('name')] = html_entity_decode($item["custom_attribute"]);
//                $customAttribute = $this->productRepository
//                    ->getById($item['entity_id'])
//                    ->getCustomAttribute('custom_attribute_varchar')
//                    ->getValue();
//                $item['custom_attribute'] = $customAttribute;
            }
        }
        return $dataSource;
    }

}
