<?php


use Phinx\Migration\AbstractMigration;

class Library extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up () {
        $table = $this->table('library');
        $table->addColumn('user_id', 'integer', ['limit' => 11, 'null' => true])
            ->addColumn('book_id', 'integer', ['limit' => 11, 'null' => false])
            ->addColumn('deleted', 'enum', ['values' => ['yes', 'no'], 'default' => 'no'])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('user_id', 'users', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'CASCADE'))
            ->addForeignKey('book_id', 'books', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'CASCADE'))
            ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('library');
    }
}
