<?php


namespace Magenest\Bt2\Block\Adminhtml\Config\Form;


use Magento\Config\Block\System\Config\Form\Field;

class ColorPicker extends Field
{
    public $text;
    public function __construct(\Magento\Backend\Block\Template\Context $context,
                                \Magento\Framework\Data\Form\Element\Text $text,
                                array $data = [])
    {
        $this->text = $text;
        parent::__construct($context, $data);
    }
    public function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $input = $this->text;
        $input->setForm($element->getForm())
            ->setElement($element)
            ->setValue($element->getValue())
            ->setHtmlId($element->getHtmlId())
            ->setClass('ddg-colpicker')
            ->setName($element->getName());

        $html = $input->getHtml();
        $html.='<script type="text/javascript">
            require(["jquery"], function ($) {
                    var $el = $("#'.$element->getHtmlId().'");

                    $el.css("backgroundColor", "");


                    $(document).click(function(){
                        $el.css("backgroundColor",$el.val());
                    });
                    $(document).ready(function(){
                        $el.css("backgroundColor",$el.val());
                    })
            });
            </script>';
        return $html;
    }

}
