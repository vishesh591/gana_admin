<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class AddResolutionFieldsToYoutubeConflicts extends Migration
{
    public function up()
    {
        // Connect DB
        $db = Database::connect();
        $fields = $db->getFieldData('youtube_conflicts');
        $fieldNames = array_column($fields, 'name');

        // Add resolution_rights_owned
        if (!in_array('resolution_rights_owned', $fieldNames)) {
            $this->forge->addColumn('youtube_conflicts', [
                'resolution_rights_owned' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'link_to_issue',
                ],
            ]);
        }

        // Add resolution_date
        if (!in_array('resolution_date', $fieldNames)) {
            $this->forge->addColumn('youtube_conflicts', [
                'resolution_date' => [
                    'type'  => 'DATETIME',
                    'null'  => true,
                    'after' => 'resolution_rights_owned',
                ],
            ]);
        }

        // Add supporting_document_path
        if (!in_array('supporting_document_path', $fieldNames)) {
            $this->forge->addColumn('youtube_conflicts', [
                'supporting_document_path' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 500,
                    'null'       => true,
                    'after'      => 'resolution_date',
                ],
            ]);
        }

        // Add resolution_status
        if (!in_array('resolution_status', $fieldNames)) {
            $this->forge->addColumn('youtube_conflicts', [
                'resolution_status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                    'default'    => 'Action Required',
                    'after'      => 'supporting_document_path',
                ],
            ]);
        }
    }

    public function down()
    {
        $this->forge->dropColumn('youtube_conflicts', 'resolution_rights_owned');
        $this->forge->dropColumn('youtube_conflicts', 'resolution_date');
        $this->forge->dropColumn('youtube_conflicts', 'supporting_document_path');
        $this->forge->dropColumn('youtube_conflicts', 'resolution_status');
    }
}
