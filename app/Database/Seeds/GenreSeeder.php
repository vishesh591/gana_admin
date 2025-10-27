<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            ['name' => 'Pop', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rock', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Hip-Hop / Rap', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'R&B / Soul', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jazz', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Blues', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Classical', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Country', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Folk', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Reggae', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Electronic / EDM', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dance', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Disco', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Funk', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gospel', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Metal', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Punk', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Indie', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Alternative', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Latin', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Afrobeat', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'K-Pop', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'J-Pop', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bollywood / Indian Pop', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'World Music', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Acoustic', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ambient', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'House', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Techno', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Trance', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dubstep', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Drum & Bass', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lo-fi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Experimental', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Opera', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Soundtrack / Film Score', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Children’s Music', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Spoken Word / Poetry', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Instrumental', 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('g_genres')->insertBatch($data);
    }
}