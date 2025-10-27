<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserDataSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'created_by' => null,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'country_code' => '+91',
            'phone' => '9999999999',
            // Hash the password using PASSWORD_DEFAULT
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role_id' => 1, // Superadmin
            'parent_id' => null,
            'profile_picture' => null,
            'company_name' => null,
            'primary_label_name' => null,
            'label' => null,
            'user_name' => 'Admin123',
            'account_number' => null,
            'ifsc_code' => null,
            'holder_name' => null,
            'branch_name' => null,
            'agreement_start_date' => null,
            'agreement_end_date' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => null,
            'agreement_document' => null
        ];

        $this->db->table('g_users')->insert($data);
    }
}
