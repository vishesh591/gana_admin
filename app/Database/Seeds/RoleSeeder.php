<?php 
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'role_name' => 'superadmin'],
            ['id' => 2, 'role_name' => 'subadmin'],
            ['id' => 3, 'role_name' => 'distributor'],
            ['id' => 4, 'role_name' => 'label'],
            ['id' => 5, 'role_name' => 'artist'],
        ];
        $this->db->table('g_roles')->insertBatch($data);
    }
}
