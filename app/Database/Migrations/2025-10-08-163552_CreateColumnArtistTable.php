<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateColumnArtistTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('artists', [
            'label_name' => [
                'type'       => 'Varchar',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'id'
            ],
            'label_id' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
                'null'       => true,
                'after'      => 'label_name'
            ]
        ]);
    }
    
    public function down()
    {
        $this->forge->dropColumn('artists', ['label_name', 'label_id']);
    }
}
