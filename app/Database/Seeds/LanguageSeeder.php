<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            ['name' => 'English', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Hindi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Urdu', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Punjabi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Haryanvi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bengali', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tamil', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Telugu', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kannada', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Malayalam', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Marathi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gujarati', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bhojpuri', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Maithili', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Khortha', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sanskrit', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Assamese', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Odia', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rajasthani', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Konkani', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Arabic', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Chinese (Mandarin, Cantonese)', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'French', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'German', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Italian', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Japanese', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Korean', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Portuguese', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Russian', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Spanish', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Turkish', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Thai', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vietnamese', 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('g_languages')->insertBatch($data);
    }
}
