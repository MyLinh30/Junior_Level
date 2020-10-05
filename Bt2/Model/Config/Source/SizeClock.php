<?php


namespace Magenest\Bt2\Model\Config\Source;


use Magento\Framework\Option\ArrayInterface;

class SizeClock implements ArrayInterface
{

    public function toOptionArray()
    {
        return [
            ['value'=> 'small', 'label'=> __('Small')],
            ['value'=> 'medium', 'label'=> __('Medium')],
            ['value'=> 'large','label'=>__('Large')]
        ];
        // TODO: Implement toOptionArray() method.
    }
}
