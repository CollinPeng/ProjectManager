<?php

use Phinx\Migration\AbstractMigration;

class Users extends AbstractMigration
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
        $this->table('users')
            ->addColumn('username', 'string', ['limit' => 50, 'comment' => '用户名'])
            ->addColumn('password', 'string', ['limit' => 50, 'comment' => '密码'])
            ->addColumn('password_salt', 'string', ['limit' => 50, 'comment' => '密码加盐'])
            ->addColumn('email', 'string', ['default' => '', 'limit' => 50, 'comment' => '邮箱地址'])
            ->addColumn('created','datetime', ['null' => true])
            ->addColumn('updated', 'datetime', ['null' => true])
            ->addIndex(['username', 'email'], ['unique' => true])
            ->save();
    }
}
