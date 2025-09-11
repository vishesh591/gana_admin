<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFacebookConflictsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            // Reference copyright details
            'reference_copyright_id'                => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'reference_copyright_creation_date'     => ['type' => 'DATETIME', 'null' => true],
            'reference_copyright_artist'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'reference_copyright_title'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'reference_copyright_isrc'              => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'reference_copyright_match_count'       => ['type' => 'INT', 'null' => true],

            // Conflict details
            'conflict_id'                           => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'conflict_type'                         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'conflict_creation_date'                => ['type' => 'DATETIME', 'null' => true],
            'conflict_modification_date'            => ['type' => 'DATETIME', 'null' => true],
            'conflict_state'                        => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'conflicting_territories'               => ['type' => 'TEXT', 'null' => true], // ISO codes list

            // Other party
            'other_party_name'                      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'other_party_reference_copyright_id'    => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'other_party_reference_copyright_artist'=> ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'other_party_reference_copyright_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'other_party_reference_copyright_isrc'  => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],

            // Stats
            'last_28_days_view_count'               => ['type' => 'INT', 'null' => true],
            'reference_overlap_percentage'          => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'reference_overlap_duration_ms'         => ['type' => 'BIGINT', 'null' => true],

            // Category
            'conflict_category'                     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],

            // Version titles
            'reference_copyright_version_title'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'other_party_reference_copyright_version_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],

            // Expiration
            'conflict_expiration_date'              => ['type' => 'DATETIME', 'null' => true],

            // Asset info
            'reference_asset_id'                    => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'other_party_reference_overlap_percentage' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'other_party_reference_overlap_duration_ms' => ['type' => 'BIGINT', 'null' => true],
            'status'                                => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('facebook_conflicts');
    }

    public function down()
    {
        $this->forge->dropTable('facebook_conflicts');
    }
}
