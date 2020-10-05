<?php


namespace Magenest\Bt1\Setup;


use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $linhTable = $installer->getConnection()->newTable($installer->getTable('magenest_rules'))
            ->addColumn('id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10, [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'ID')
            ->addColumn('title',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                50, [
                    'nullable' => false,
                ], 'Title')
            ->addColumn('status',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                10,
                ['nullable' => false],
                'Status')
            ->addColumn('rule_type',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                11, ['nullable' => false],
                'Rule type')
            ->addColumn('conditions_serialized',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Conditions Serialized')->setComment('Magenest RULES');
        $installer->getConnection()->createTable($linhTable);
        $installer->endSetup();
    }
}
