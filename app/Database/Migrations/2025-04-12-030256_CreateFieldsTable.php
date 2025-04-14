<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFieldsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'sport' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('fields');
    }

    public function down()
    {
        $this->forge->dropTable('fields');
    }
}
