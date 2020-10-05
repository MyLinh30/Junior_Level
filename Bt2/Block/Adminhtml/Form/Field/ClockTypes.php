<?php


namespace Magenest\Bt2\Block\Adminhtml\Form\Field;


use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;

class ClockTypes extends AbstractFieldArray
{
    protected $clockTypeRenderer;
    protected $customerGroupRenderer;
    protected function _prepareToRender()
    {
        $this->addColumn('customer_group', [
            'label' => __('Customer group'),
            'class' => 'required-entry',
            'renderer' => $this->getCustomerGroupRenderer()
        ]);
        $this->addColumn('clock_type', [
            'label' => __('Clock Type'),
            'renderer' => $this->getClockTypeRenderer()
        ]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Type');
    }
    /**
     * Prepare existing row data object
     *
     * @param DataObject $row
     * @throws LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];


        $customerGroup = $row->getCustomerGroup();
        if ($customerGroup !== null) {
            $options['option_' . $this->getCustomerGroupRenderer()->calcOptionHash($customerGroup)] = 'selected="selected"';
        }

        $clockType = $row->getClockType();
        if ($clockType !== null) {
            $options['option_' . $this->getClockTypeRenderer()->calcOptionHash($clockType)] = 'selected="selected"';
        }

        $row->setData('option_extra_attrs', $options);
    }

    private function getCustomerGroupRenderer()
    {
        if (!$this->customerGroupRenderer) {
            $this->customerGroupRenderer = $this->getLayout()->createBlock(
                CustomerGroup::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->customerGroupRenderer;
    }

    private function getClockTypeRenderer()
    {
        if (!$this->clockTypeRenderer) {
            $this->clockTypeRenderer = $this->getLayout()->createBlock(
                ClockType::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->clockTypeRenderer;
    }

}
