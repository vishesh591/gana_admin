<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class ArtistModel extends Model
{
    protected $table = 'artists';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'spotify_id', 'apple_id', 'profile_image','created_by','label_name','label_id'
    ];
}
