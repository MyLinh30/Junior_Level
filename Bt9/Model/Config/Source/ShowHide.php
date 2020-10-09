<?php


namespace Magenest\Bt9\Model\Config\Source;


use Magento\Framework\Option\ArrayInterface;

class ShowHide implements ArrayInterface
{

    public function toOptionArray()
    {
        return[
            ['label'=>'Hide', 'value'=> 0],
            ['label'=>'Show', 'value'=> 1],
        ];
        // TODO: Implement toOptionArray() method.
    }
}
