<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateConflictCountriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'conflict_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'country_id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                // 'auto_increment' => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        // Foreign keys
        $this->forge->addForeignKey('conflict_id', 'facebook_conflicts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('country_id', 'countries', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('conflict_countries');
    }

    public function down()
    {
        $this->forge->dropTable('conflict_countries');
    }
}
