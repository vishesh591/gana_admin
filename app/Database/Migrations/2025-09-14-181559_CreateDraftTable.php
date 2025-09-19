<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDraftTable extends Migration
{
    public function up()
    {
        // Release drafts table for saving incomplete forms
        $this->forge->addField([
            'id'                    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'draft_name'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'release_id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            // Step 1 - Metadata
            'title'                 => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'label_id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'artist_id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'featuring_artist_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'release_type'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'mood_type'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'genre_type'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'upc_ean'               => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'language'              => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'artwork'               => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            
            // Step 2 - Track Information & Uploads
            'track_title'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'secondary_track_type'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'instrumental'          => ['type' => "ENUM('yes','no')", 'null' => true],
            'isrc'                  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'author'                => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'composer'              => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'remixer'               => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'arranger'              => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'music_producer'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'publisher'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'c_line_year'           => ['type' => 'VARCHAR', 'constraint' => 4, 'null' => true],
            'c_line'                => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'p_line_year'           => ['type' => 'VARCHAR', 'constraint' => 4, 'null' => true],
            'p_line'                => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'production_year'       => ['type' => 'VARCHAR', 'constraint' => 4, 'null' => true],
            'track_title_language'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'explicit_song'         => ['type' => "ENUM('yes','no')", 'null' => true],
            'lyrics'                => ['type' => 'TEXT', 'null' => true],
            'audio_file'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            
            // Step 3 - Stores
            'stores_ids'            => ['type' => 'JSON', 'null' => true],
            'rights_management'     => ['type' => 'JSON', 'null' => true],
            
            // Step 4 - Dates & Pricing
            'release_date'          => ['type' => 'DATE', 'null' => true],
            'pre_sale_date'         => ['type' => 'DATE', 'null' => true],
            'original_release_date' => ['type' => 'DATE', 'null' => true],
            'release_price'         => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => true],
            'sale_price'            => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => true],
            
            // Step 5 - Terms & Conditions
            'content_guidelines'    => ['type' => 'BOOLEAN', 'default' => false],
            'isrc_guidelines'       => ['type' => 'BOOLEAN', 'default' => false],
            'youtube_guidelines'    => ['type' => 'BOOLEAN', 'default' => false],
            'audio_store_guidelines'=> ['type' => 'BOOLEAN', 'default' => false],
            
            // Meta fields
            'current_step'          => ['type' => 'INT', 'constraint' => 1, 'default' => 1],
            'completion_percentage' => ['type' => 'INT', 'constraint' => 3, 'default' => 0],
            'form_data_json'        => ['type' => 'JSON', 'null' => true], // Backup of all form data
            'created_at'            => ['type' => 'DATETIME', 'null' => true],
            'updated_at'            => ['type' => 'DATETIME', 'null' => true]
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'updated_at']);
        $this->forge->createTable('release_drafts');
    }

    public function down()
    {
        $this->forge->dropTable('release_drafts');
    }
}