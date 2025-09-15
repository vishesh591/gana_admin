<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateYoutubeConflictTable extends Migration
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
            'issue_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'issue_type' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'other_party' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'expiry_date' => ['type' => 'DATE', 'null' => true],
            'expiry_time' => ['type' => 'TIME', 'null' => true],
            'asset_name' => ['type' => 'VARCHAR', 'constraint' => 1000, 'null' => true],
            'asset_type' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'asset_created_on' => ['type' => 'DATE', 'null' => true],
            'asset_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'reference_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'isrc' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'upc' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'custom_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'labels' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'iswc' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'overlapping_asset_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'overlapping_asset_name' => ['type' => 'VARCHAR', 'constraint' => 1000, 'null' => true],
            'video_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'video_title' => ['type' => 'VARCHAR', 'constraint' => 1000, 'null' => true],
            'channel_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'channel_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'claim_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'match_type' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'engaged_views_affected_daily' => ['type' => 'BIGINT', 'null' => true],
            'engaged_views_lifetime' => ['type' => 'BIGINT', 'null' => true],
            'claimed_videos_affected' => ['type' => 'BIGINT', 'null' => true],
            'duration_time_seconds' => ['type' => 'INT', 'null' => true],
            'duration_percentage_reference' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'duration_percentage_video' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'default' => 'Action Required'],
            'status_detail' => ['type' => 'VARCHAR', 'constraint' => 1000, 'null' => true],
            'link_to_issue' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('youtube_conflicts');
    }

    public function down()
    {
        $this->forge->dropTable('youtube_conflicts');
    }
}
