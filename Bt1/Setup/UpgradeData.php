<?php


namespace Magenest\Bt1\Setup;


use Magento\Framework\App\ProductMetadataInterface;
use Magento\Framework\DB\FieldDataConverterFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $productMetadata;
    private $fieldDataConverterFactory;
    protected $ruleCollectionFactory;
    private $serialize;
    private $json;
    protected $jsonHelper;
    protected $ruleFactory;
    public function __construct(ProductMetadataInterface $productMetadata,
                                FieldDataConverterFactory $fieldDataConverterFactory,
                                \Magento\Framework\Json\Helper\Data $jsonHelper,
                                \Magenest\Bt1\Model\RuleFactory $ruleFactory,
                                \Magenest\Bt1\Model\ResourceModel\Rule\CollectionFactory $ruleCollectionFactory,
                                \Magento\Framework\Serialize\Serializer\Json $json,
                                \Magento\Framework\Serialize\Serializer\Serialize $serialize)
    {
        $this->jsonHelper = $jsonHelper;
        $this->fieldDataConverterFactory = $fieldDataConverterFactory;
        $this->productMetadata = $productMetadata;
        $this->ruleCollectionFactory = $ruleCollectionFactory;
        $this->json = $json;
        $this->serialize = $serialize;
        $this->ruleFactory = $ruleFactory;
    }
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), "1.0.4", '<')) {
            $currentVersion = $this->productMetadata->getVersion();
            $collection = $this->ruleCollectionFactory->create();
            $allCollection = $collection->getData();
            if (version_compare($currentVersion, '2.2', '<')) {
                foreach ($allCollection as $rule) {
                    $model = $this->ruleFactory->create()->load($rule['id']);
                    if ($model->getId()) {
                        $model->setConditionsSerialized($this->serialize->serialize($model['conditions_serialized']));
                        $model->save();
                    }
                }
            } else {
                foreach ($allCollection as $rule) {
                    $model = $this->ruleFactory->create()->load($rule['id']);
                    if ($model->getId()) {
                        $model->setConditionsSerialized($this->jsonHelper->jsonEncode($model['conditions_serialized']));
                        $model->save();
                    }
                }

            }

        }
    }
}
