<?php


use Phinx\Migration\AbstractMigration;

class Books extends AbstractMigration
{
   /**
     * Migrate Up.
     */
    public function up () {
        $table = $this->table('books');
        $table->addColumn('user_id', 'integer', ['limit' => 11, 'null' => true])
            ->addColumn('category_id', 'integer', ['limit' => 11, 'null' => false])
            ->addColumn('title', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('author', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('deleted', 'enum', ['values' => ['yes', 'no'], 'default' => 'no'])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('user_id', 'users', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'CASCADE'))
            ->addForeignKey('category_id', 'category', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'CASCADE'))
            ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('books');
    }
}
