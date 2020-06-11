<?php

use Phinx\Migration\AbstractMigration;

/**
 * 协作者关系
 * Class Collaborators
 */
class Collaborators extends AbstractMigration
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
        $this->table('collaborators')
            ->addColumn('uid', 'integer', ['comment' => '用户id'])
            ->addColumn('pid', 'integer', ['comment' => '项目id'])
            ->addColumn('created', 'datetime', ['null' => true, 'comment' => '创建时间'])
            ->addIndex(['uid', 'pid'], ['unique' => true])
            ->save();
    }
}
