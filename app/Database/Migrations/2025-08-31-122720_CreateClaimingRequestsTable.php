<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClaimingRequestsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'song_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'artist_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'upc' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'isrc' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'video_links' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'removal_reason' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'instagram_link' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => true,
            ],
            'facebook_link' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Pending', 'Approved', 'Rejected'],
                'default'    => 'Pending',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('isrc');
        $this->forge->addKey('status');
        $this->forge->addKey('created_at');
        $this->forge->createTable('claiming_requests');
    }

    public function down()
    {
        $this->forge->dropTable('claiming_requests');
    }
}