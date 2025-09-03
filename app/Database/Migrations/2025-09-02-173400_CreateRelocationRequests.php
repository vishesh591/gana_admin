<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRelocationRequests extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'song_name'       => ['type' => 'VARCHAR', 'constraint' => '255'],
            'artist_name'     => ['type' => 'VARCHAR', 'constraint' => '255'],
            'isrc'            => ['type' => 'VARCHAR', 'constraint' => '50'],
            'instagram_link'  => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'instagram_audio' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'facebook_link'   => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'status'          => ['type' => 'ENUM', 'constraint' => ['Pending','Approved','Rejected'], 'default' => 'Pending'],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('relocation_requests');
    }

    public function down()
    {
        $this->forge->dropTable('relocation_requests');
    }
}
