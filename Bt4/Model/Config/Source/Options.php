<?php


namespace Magenest\Bt4\Model\Config\Source;


use Magento\Framework\Option\ArrayInterface;

class Options implements ArrayInterface
{

    public function toOptionArray()
    {
       return [
           ['value' => 'test_value_1', 'label' => 'Test Value 1'],
           ['value' => 'test_value_2', 'label' => 'Test Value 2'],
           ['value' => 'test_value_3', 'label' => 'Test Value 3'],
       ];
    }
}
