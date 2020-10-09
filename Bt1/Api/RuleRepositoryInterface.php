<?php


namespace Magenest\Bt1\Api;
use \Magenest\Bt1\Api\Data\RuleInterface;

interface RuleRepositoryInterface
{

    public function save(RuleInterface $rule);
    public function get ($id);
    /**
     * @param int $id
     * @return \Magenest\Bt1\Api\Data\RuleInterface
     */
    public function getById(int $id);

    /**
     * @param int $id
     * @return void
     */
    public function deleteById($id);
    public function delete (RuleInterface $rule);


}
