<?php


namespace Magenest\Bt5\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ProductSaveAfter implements ObserverInterface
{
    protected $productFactory;
    protected $productCollectionFactory;

    public function __construct(\Magento\Catalog\Model\ProductFactory  $productFactory,
                                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory)
    {
        $this->productFactory = $productFactory;
        $this->productCollectionFactory = $productCollectionFactory;
    }

    public function execute(Observer $observer)
    {
        $data = $observer->getProduct();
//        $model = $this->productFactory->create();
        $string = "varchar(" .strlen($data['custom_attribute_varchar']). ")";
        $data->setCustomAttributeVarchar($data['custom_attribute_varchar'] ." ".$string);
//        else {
//            $model = $this->productFactory->create();
//            $string = "varchar(" .strlen($data['custom_attribute_varchar']). ")";
//            $model->setCustomAttributeVarchar($data['custom_attribute_varchar'] .$string);
//            $model->save();
//        }
//        $model = $this->productFactory->create()->load($data['entity_id']);
//        $tring = "varchar(" . strlen($model->getCustomAttributeVarchar());
//        $model->setCustomAttributeVarchar();
//        $model->save();
    }
}
