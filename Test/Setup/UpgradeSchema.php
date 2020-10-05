<?php


namespace Magenest\Test\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
//        if(version_compare($context->getVersion(),'1.0.1','<'))
//        {
//            $installer = $setup;
//            $installer->startSetup();
//            $connection = $installer->getConnection();
//            $gamerTable = $installer->getConnection()->newTable(
//                $installer->getTable('magenest_gift')
//            )->addColumn(
//                'id',
//                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//                10, [
//                'identity' => true,
//                'unsigned' => true,
//                'nullable' => false,
//                'primary' => true
//            ],
//                'ID'
//            )->addColumn(
//                'name',
//                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                50, [
//                'nullable' => false,
//            ],
//                'Name'
//            )->addColumn(
//                'url',
//                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                250, [
//                'nullable' => false,
//            ],
//                'Url'
//            )->addColumn(
//                'description',
//                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                100, [
//                'nullable' => false,
//            ],
//                'Description'
//            )->setComment('Magenest Gift Table');
//            $installer->getConnection()->createTable($gamerTable);
//            $installer->endSetup();
//        }

        if(version_compare($context->getVersion(),'1.0.3','<'))
        {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();
            $gamerTable = $installer->getConnection()->newTable(
                $installer->getTable('magenest_history_point')
            )->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10, [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'ID'
            )->addColumn(
                'customer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10, [
                'nullable' => false,

            ],
                'Customer ID'
            )->addColumn(
                'point',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                100, [
                'nullable' => false,
            ],
                'Point'
            )->addColumn(
                'time',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
                100, [
                'nullable' => false,
            ],
                'Time'
            )->setComment('Magenest History Point Table');
            $installer->getConnection()->createTable($gamerTable);
            $installer->endSetup();
        }
    }
}
