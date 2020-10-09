<?php


namespace Magenest\Bt5\Model\Config\Source;


use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class ShowCustomerGroup extends AbstractSource
{
    protected $customerGroupCollectionFactory;
    public function __construct(\Magento\Customer\Model\ResourceModel\Group\CollectionFactory $customerGroupCollectionFactory)
    {
        $this->customerGroupCollectionFactory = $customerGroupCollectionFactory;
    }

    public function getAllOptions()
    {
        $collection = $this->customerGroupCollectionFactory->create()->getData();
        $options[] =['value'=>null,'label'=> __('--Select Option--')];
        foreach ($collection as $item){
            $options[] = ['label'=>$item['customer_group_code'], 'value'=>$item['customer_group_id'] ];
        }
        return $options;
    }
}
