<?php


namespace Magenest\Bt5\Model\Product\Type;


class NewProductType extends \Magento\Catalog\Model\Product\Type\Virtual
{
    const TYPE_ID = "new_product_type";
    /**
     * Delete data specific for Simple product type
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return void
     */
    public function deleteTypeSpecificData(\Magento\Catalog\Model\Product $product)
    {
    }
}
