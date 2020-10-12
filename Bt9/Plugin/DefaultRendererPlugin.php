<?php


namespace Magenest\Bt9\Plugin;


class DefaultRendererPlugin
{
    public function aroundGetColumnHtml(\Magento\Sales\Block\Adminhtml\Order\View\Items\Renderer\DefaultRenderer $defaultRenderer, \Closure $proceed,\Magento\Framework\DataObject $item, $column, $field=null)
    {
        if ($column == 'message'){
            $data = $item->getProductOptions();
            $res = $data['info_buyRequest'];
            if($res['message']){
                $html = $res['message'];
                $result = $html;
            }
            else {
                $result = " ";
            }
        }else{
            if ($field){
                $result = $proceed($item,$column,$field);
            }else{
                $result = $proceed($item,$column);

            }
        }

        return $result;
    }
}
