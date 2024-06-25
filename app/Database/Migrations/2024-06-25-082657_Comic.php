<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comic extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'collation' => 'utf8mb4_general_ci',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'collation' => 'utf8mb4_general_ci',
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'collation' => 'utf8mb4_general_ci',
            ],
            'publisher' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'collation' => 'utf8mb4_general_ci',
            ],
            'cover' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'collation' => 'utf8mb4_general_ci',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('comic');
    }

    public function down()
    {
        //
        $this->forge->dropTable('comic');
    }
}
