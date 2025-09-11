<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCountries extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'short_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            'iso2'       => [
                'type'       => 'CHAR',
                'constraint' => 2,
            ],
            'iso3'       => [
                'type'       => 'CHAR',
                'constraint' => 3,
                'null'       => true,
            ],
            'continent'  => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
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
        $this->forge->addUniqueKey('iso2');
        $this->forge->addUniqueKey('iso3');

        $this->forge->createTable('countries', true);
    }

    public function down()
    {
        $this->forge->dropTable('countries', true);
    }
}
