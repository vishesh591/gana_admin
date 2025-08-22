<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSupportRequestsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'full_name'     => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'      => true

            ],
            'email'         => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'      => true

            ],
            'subject'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'      => true

            ],
            'message'       => [
                'type' => 'TEXT',
                'null'      => true

            ],
            'status'        => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'in_review', 'resolved'],
                'default'    => 'pending',
                'null'      => true
            ],
            'created_at'    => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'    => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('support_requests');
    }

    public function down()
    {
        $this->forge->dropTable('support_requests');
    }
}
