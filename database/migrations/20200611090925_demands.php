<?php

use Phinx\Migration\AbstractMigration;

/**
 * 需求
 *
 * Class Demands
 */
class Demands extends AbstractMigration
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
        $this->table('demands')
            ->addColumn('title', 'string', ['limit' => 200, 'comment' => '需求标题'])
            ->addColumn('description', 'string', ['limit' => 255, 'comment' => '需求描述'])
            ->addColumn('dataline', 'datetime', ['comment' => '截止日期'])
            ->addColumn('images', 'text', ['comment' => '由字符串分割的图片信息'])
            ->addColumn('content', 'text', ['comment' => '内容'])
            ->addColumn('priority', 'integer', ['comment' => '优先级'])
            ->addColumn('pid', 'integer', ['comment' => '项目 id'])
            ->addColumn('uid', 'integer', ['comment' => '用户 id'])
            ->save();
    }
}
