<?php

use Phinx\Migration\AbstractMigration;

class SystemConfig extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->table('system_config')
            ->addColumn('website_name', 'string', ['limit' => 100, 'comment' => '网站名称'])
            ->addColumn('registrable', 'boolean', ['default' => true, 'comment' => '是否可注册'])
            ->addColumn('updated', 'datetime', ['null' => true, 'comment' => '修改时间'])
            ->save();
    }
}
