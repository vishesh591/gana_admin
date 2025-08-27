<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateReleaseTable extends Migration
{
    public function up()
    {
        // Main release table
        $this->forge->addField([
            'id'                  => ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true],
            'title'               => ['type' => 'VARCHAR','constraint' => 255],
            'label_id'            => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'release_type'        => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'mood_type'           => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'genre_type'          => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'upc_ean'             => ['type' => 'VARCHAR','constraint' => 255,'unique' => true,'null' => true],
            'language'            => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'artwork'             => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'track_title'         => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'secondary_track_type'=> ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'instrumental'        => ['type' => "ENUM('No','Yes')",'default' => 'No'],
            'isrc'                => ['type' => 'VARCHAR','constraint' => 255,'unique' => true,'null' => true],
            'author'              => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'composer'            => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'remixer'             => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'arranger'            => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'music_producer'      => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'publisher'           => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'c_line_year'         => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'c_line'              => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'p_line_year'         => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'p_line'              => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'production_year'     => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'track_title_language'=> ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'explicit_song'       => ['type' => "ENUM('NA','Yes','No')",'null' => true],
            'lyrics'              => ['type' => 'TEXT','null' => true],
            'message'             => ['type' => 'TEXT','null' => true],
            'audio_file'          => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'stores_ids'          => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'rights_management_options' => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'release_date'        => ['type' => 'DATE','null' => true],
            'pre_sale_date'       => ['type' => 'DATE','null' => true],
            'original_release_date'=> ['type' => 'DATE','null' => true],
            'release_price'       => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'sale_price'          => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            't_and_c'             => ['type' => 'TEXT','null' => true],
            'created_at'          => ['type' => 'DATETIME','null' => true],
            'updated_at'          => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('label_id', 'labels', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('g_release');
    }

    public function down()
    {
        $this->forge->dropTable('g_release');
    }
}
