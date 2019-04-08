<?php

namespace Magenest\Movie\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup,
                            ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.1.0') < 0)
        {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();
//Install new database table
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_director')
            )->addColumn('director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'director ID'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,[
                'nullable' => true,
            ],
                'name'
            );
            $installer->getConnection()->createTable($table);

            $connection = $installer->getConnection();
//Install new database table
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_actor')
            )->addColumn('actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'actor ID'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,[
                'nullable' => true,
            ],
                'name'
            );
            $installer->getConnection()->createTable($table);

            $connection = $installer->getConnection();
//Install new database table
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie')
            )->addColumn('movie_id',\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,null ,
                [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ] ,
                'Movie ID'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64, [
                'nullable' => true,
            ],
                'name'
            )->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,64,
                [
                'nullable' => true,
            ],
                'description'
            )->addColumn(
                'rating',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,10,
                ['nullable' => true],
                'rating'
            )->addColumn(
                'director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,10,
                ['nullable' => false,
                 'unsigned' => true],
                'director_id'
            )->addForeignKey(
                $installer->getFkName(
                'magenest_movie',
                'directory_id',
                'magenest_director',
                'director_id'
            ),
                'director_id',
                 $installer->getTable('magenest_director'),
                'director_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            );
            $installer->getConnection()->createTable($table);

            $connection = $installer->getConnection();
//Install new database table
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie_actor')
            )->addColumn('movie_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                    'nullable' => false,
                    'unsigned' => true,
                ],
                'actor ID'
            )->addColumn(
                'actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                'nullable' => false,
                'unsigned' => true,
            ],
                'name'
            )->addForeignKey($installer->getFkName(
                'magenest_movie_actor',
                'movie_id',
                'magenest_movie',
                'movie_id'
                ),'movie_id',
                $installer->getTable('magenest_movie'),
                'movie_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE)
                ->addForeignKey($installer->getFkName(
                    'magenest_movie_actor',
                    'actor_id',
                    'magenest_actor',
                    'actor_id'
                ),'actor_id'
                    ,$installer->getTable('magenest_actor'),
                    'actor_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE);
            $installer->getConnection()->createTable($table);
            $installer->getConnection()->createTable($table);

            $installer->endSetup();
        }
    }
}