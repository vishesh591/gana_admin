<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLabelsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'label_name'        => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'primary_label_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'profile_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255, // store file path/URL
                'null'       => true,
            ],
            'created_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('labels');
    }

    public function down()
    {
        $this->forge->dropTable('labels');
    }
}
