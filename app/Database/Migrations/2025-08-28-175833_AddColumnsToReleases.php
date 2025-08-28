<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnsToReleases extends Migration
{
    public function up()
    {
        $this->forge->addColumn('release', [
            'artist_id' => [
                'type'       => 'INTEGER',
                'null'       => true,
                'after'      => 'label_id' // adjust position if needed
            ],
            'featuring_artist_id' => [
                'type'       => 'INTEGER',
                'null'       => true,
                'after'      => 'artist_id'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('releases', ['artist_id', 'featuring_artist_id']);
    }
}
