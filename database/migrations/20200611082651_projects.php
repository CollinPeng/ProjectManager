<?php

use Phinx\Migration\AbstractMigration;

class Projects extends AbstractMigration
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
        $this->table('projects')
            ->addColumn('title', 'string', ['limit' => 50, 'comment' => '项目名称'])
            ->addColumn('description', 'text', ['comment' => '项目描述'])
            ->addColumn('uid', 'integer', ['comment' => '创建用户'])
            ->addColumn('created', 'datetime', ['comment' => '创建时间', 'null' => true])
            ->addColumn('updated', 'datetime', ['comment' => '更新时间', 'null' => true])
            ->save();
    }
}
