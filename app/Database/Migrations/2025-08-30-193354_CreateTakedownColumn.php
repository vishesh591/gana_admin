<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTakedownColumn extends Migration
{
    public function up()
    {
        $table = 'g_releases';
        $db = \Config\Database::connect();

        if ($db->tableExists($table)) {
            $fields = $db->getFieldNames($table);

            if (!in_array('approved_at', $fields)) {
                $this->forge->addColumn($table, [
                    'approved_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                ]);
            }

            if (!in_array('takedown_request_at', $fields)) {
                $this->forge->addColumn($table, [
                    'takedown_request_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                ]);
            }

            if (!in_array('takedown_at', $fields)) {
                $this->forge->addColumn($table, [
                    'takedown_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                ]);
            }
        }
    }

    public function down()
    {
        $table = 'g_releases';

        $this->forge->dropColumn($table, ['approved_at', 'takedown_request_at', 'takedown_at']);
    }
}
