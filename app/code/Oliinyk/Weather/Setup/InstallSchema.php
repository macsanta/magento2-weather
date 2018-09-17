<?php

namespace Oliinyk\Weather\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();

        /*
         * Create table 'weather_items'
         */

        $table = $installer->getConnection()->newTable(
            $installer->getTable('weather_items')
        )->addColumn(
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Item id'
        )->addColumn(
            'city_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'default' => 0],
            'City API ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'City name'
        )->addColumn(
            'temp',
            \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
            null,
            ['nullable' => true],
            'Temperature'
        )->addColumn(
            'temp_max',
            \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
            null,
            ['nullable' => true],
            'Temperature max'
        )->addColumn(
            'temp_min',
            \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
            null,
            ['nullable' => true],
            'Temperature min'
        )->addColumn(
            'publish_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'Publish Date'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT,
            ],
            'Creation Time'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'Modification Time'
        )->setComment(
            'Weather Menu Data Table'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
