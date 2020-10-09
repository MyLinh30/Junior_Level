<?php


namespace Magenest\Bt8\Plugin;


class CustomProductName
{
//     public function afterGetList(\Magento\Catalog\Api\ProductRepositoryInterface $subject,\Magento\Framework\Api\SearchResults $searchResult)
//     {
//        foreach ($searchResult->getItems() as $product){
//            if($product->getSpecialPrice()){
//                $product->setData('name',"Special:". $product->getName());
//            }
//            return $searchResult;
//        }
//     }
     public function afterGetName (\Magento\Catalog\Model\Product $product, $result){

         if($product->getFinalPrice()<$product->getPrice()){
             return "Result: ". $result;
         }else{
            return $result;
         }
     }
}
