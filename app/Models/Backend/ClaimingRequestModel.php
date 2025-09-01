<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class ClaimingRequestModel extends Model
{
    protected $table = 'g_claiming_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'song_name',
        'artist_name',
        'upc',
        'isrc',
        'video_links',
        'removal_reason',
        'status',
    ];
}
