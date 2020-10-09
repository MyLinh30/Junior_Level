<?php


namespace Magenest\Bt1\Model;




use Magenest\Bt1\Api\Data\RuleInterface;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magenest\Bt1\Model\RuleFactory;

class RuleRepository implements \Magenest\Bt1\Api\RuleRepositoryInterface
{
    private $ruleFactory;
    private $eventManager;
    /**
     * @var Rule[]
     */
    protected $instances = [];
    /**
     * @var Rule[]
     */
    protected $instancesById = [];
    /**
     * @var \Magenest\Bt1\Model\ResourceModel\Rule
     */
    protected $resourceModel;

    public function __construct(RuleFactory $ruleFactory,
                                \Magenest\Bt1\Model\ResourceModel\Rule $resourceModel,
                                EventManager $eventManager)
    {
        $this->ruleFactory = $ruleFactory;
        $this->eventManager = $eventManager;
        $this->ruleFactory = $ruleFactory;
    }

    public function save(RuleInterface $rule)
    {
     $model = $this->ruleFactory->create();
     $this->eventManager->dispatch('rule_save_before',['rule'=> $rule]);
     return $model->getResource()->save($rule);

    }

    public function getById($id)
    {
        if (!isset($this->instancesById[$id]))
        {
            $rule = $this->ruleFactory->create();
            $rule->load($id);
            $this->cacheProduct($rule);
        }
        return $this->instancesById[$id];
    }

    public function getRuleFromLocalCache(int $id)
    {
        return $this->instances[$id] ?? null;
    }
    private function cacheProduct(RuleInterface $rule)
    {
        $this->instancesById[$rule->getId()] = $rule;
        $this->saveRuleInLocalCache($rule);
    }
    private function saveRuleInLocalCache(Rule $rule): void
    {
        $this->instances[$rule->getId()] = $rule;
    }

    public function deleteById($id)
    {
      $model = $this->ruleFactory->create()->load($id);
      return $model->delete();
    }

    public function get($id)
    {
        $cachedProduct = $this->getRuleFromLocalCache($id);
        if ($cachedProduct === null) {
            $rule = $this->ruleFactory->create();
            $rule->load($id);
            $this->cacheProduct($rule);
            $cachedProduct = $rule;
        }
        return $cachedProduct;
    }
    /**
     * Removes product in the local cache by id.
     *
     * @param string|null $id
     * @return void
     */
    private function removeProductFromLocalCacheById(?string $id): void
    {
        unset($this->instancesById[$id]);
    }
    public function delete($rule)
    {
        try {
            $this->resourceModel->delete($rule);
        } catch (\Exception $e) {

        }
        $ruleId =  $rule->getId();
        $this->removeProductFromLocalCacheById($rule->getId());
//        $this->removeProductFromLocalCacheById($ruleId);

        return true;
    }
}
