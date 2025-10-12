<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateColumnAdditionInEveryTable extends Migration
{
    private $tables = [
        'artists',
        'claiming_requests',
        'claim_reel_merges',
        'facebook_conflicts',
        'labels',
        'release',
        'release_drafts',
        'relocation_requests',
        'support_requests',
        'users',
        'youtube_conflicts',
    ];

    public function up()
    {
        // Define the column you want to add
        $fields = [
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'after' => 'id'
            ]
        ];

        // Add the column to each table
        foreach ($this->tables as $table) {
            // Check if table exists before modifying
                $this->forge->addColumn($table, $fields);
                echo "Added column to table: {$table}" . PHP_EOL;
            } 
        }
    

    public function down()
    {
        // Remove the column from each table (rollback)
        foreach ($this->tables as $table) {
                $this->forge->dropColumn($table, 'created_by');
                echo "Removed column from table: {$table}" . PHP_EOL;
            
        }
    }

}
