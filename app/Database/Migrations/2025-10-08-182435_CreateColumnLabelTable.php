<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateColumnLabelTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('labels', [
            'status' => [
                'type'       => 'Varchar',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'primary_label_name'
            ],
            'updated_by' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
                'null'       => true,
                'after'      => 'status'
            ]
            
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('labels', ['status', 'updated_by']);
    }
}
