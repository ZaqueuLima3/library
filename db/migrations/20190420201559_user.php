<?php


use Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{

    /**
     * Migrate Up.
     */
    public function up () {
        $table = $this->table('users');
        $table->addColumn('username', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('deleted', 'enum', ['values' => ['yes', 'no'], 'default' => 'no'])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
