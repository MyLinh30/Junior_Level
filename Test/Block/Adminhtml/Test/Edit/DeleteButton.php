<?php


namespace Magenest\Test\Block\Adminhtml\Test\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    public function getButtonData()
    {
        $data = [];
        if ($this->getId()) {
            $data = [
                'label' => __('Delete GIFT'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure you want to delete this GIFT ?')
                    . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
        // TODO: Implement getButtonData() method.
    }
    public function getDeleteUrl()
    {
        return $this->getUrl('test/index/delete', ['id' => $this->getId()]);
    }
}
