<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReleaseArtistsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'release_id' => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'artist_id'  => ['type' => 'INT','constraint' => 11,'unsigned' => true],
        ]);
        $this->forge->addForeignKey('release_id', 'g_release', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('artist_id', 'artists', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('release_artists');
    }

    public function down()
    {
        $this->forge->dropTable('release_artists');
    }
}
