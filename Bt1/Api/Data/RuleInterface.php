<?php


namespace Magenest\Bt1\Api\Data;
use Magento\Framework\Api\ExtensibleDataInterface;

interface RuleInterface extends ExtensibleDataInterface
{
    const STATUS= 'status';
    const RULE_TYPE= 'rule_type';
    const CONDITIONS_SERIALIZED= 'conditions_serialized';
    const TITLE= 'title';
    const ID= 'id';
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $str
     * @return void
     */
    public function setTitle($name);
    /**
     * Rule id
     *
     * @return int|null
     */
    public function getId();
}
