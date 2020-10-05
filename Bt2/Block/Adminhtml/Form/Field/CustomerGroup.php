<?php


namespace Magenest\Bt2\Block\Adminhtml\Form\Field;


use Magento\Framework\View\Element\Html\Select;

class CustomerGroup extends Select
{
    protected $customerGroupCollectionFactory;
    public function __construct(\Magento\Framework\View\Element\Context $context,
                                \Magento\Customer\Model\ResourceModel\Group\CollectionFactory $customerGroupCollectionFactory,
                                array $data = [])
    {
        $this->customerGroupCollectionFactory = $customerGroupCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Set "name" for <select> element
     *
     * @param string $value
     * @return $this
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Set "id" for <select> element
     *
     * @param $value
     * @return $this
     */
    public function setInputId($value)
    {
        return $this->setId($value);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->getSourceOptions());
        }
        return parent::_toHtml();
    }

    public function getCustomerGroup() :array
    {
        $collection = $this->customerGroupCollectionFactory->create()->getData();
        $options = [];
        foreach ($collection as $item){
            $options[] = ['label'=>$item['customer_group_code'], 'value'=>$item['customer_group_id'] ];
        }
        return $options;
    }

    private function getSourceOptions(): array
    {
        return $this->getCustomerGroup();
    }
}
