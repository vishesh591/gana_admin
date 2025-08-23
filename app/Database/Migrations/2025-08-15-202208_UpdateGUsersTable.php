<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateGUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                   => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name'                 => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email'                => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'unique'     => true,
            ],
            'country_code'         => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'phone'                => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'password'             => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'role_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => false, // must match g_roles.id
            ],

            'parent_id'            => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true, // matches g_users.id
                'null'       => true,
            ],
            'profile_picture'      => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'company_name'         => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => true,
            ],
            'primary_label_name'           => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => true,
            ],
            'label'                => [
                'type'       => 'ENUM',
                'constraint' => ['artist', 'label', 'distributor'],
                'null'       => true,
            ],
            'user_name'            => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'account_number'       => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'null'       => true,
            ],
            'ifsc_code'            => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'holder_name'          => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'branch_name'          => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'agreement_start_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'agreement_end_date'   => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at'           => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'           => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'           => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('parent_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
