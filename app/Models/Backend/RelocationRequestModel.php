<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class RelocationRequestModel extends Model
{
    protected $table            = 'g_relocation_requests';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'song_name',
        'artist_name',
        'isrc',
        'instagram_link',
        'instagram_audio',
        'facebook_link',
        'status'
    ];
    protected $useTimestamps    = true;
}
