<?php


use Phinx\Migration\AbstractMigration;

class Category extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up () {
        $table = $this->table('category');
        $table->addColumn('category_name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('deleted', 'enum', ['values' => ['yes', 'no'], 'default' => 'no'])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
