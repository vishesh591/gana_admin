<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClaimReelMergesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'release_id'      => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'song_name'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'artist_name'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'isrc'            => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'upc'             => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'instagram_audio' => ['type' => 'TEXT', 'null' => true],
            'reel_merge'      => ['type' => 'TEXT', 'null' => true],
            'matching_time'   => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'status'          => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'Pending'],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('claim_reel_merges');
    }

    public function down()
    {
        $this->forge->dropTable('claim_reel_merges');
    }
}
