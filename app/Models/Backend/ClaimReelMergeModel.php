<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class ClaimReelMergeModel extends Model
{
    protected $table            = 'g_claim_reel_merges';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'release_id',
        'song_name',
        'artist_name',
        'isrc',
        'upc',
        'instagram_audio',
        'reel_merge',
        'matching_time',
        'status',
        'created_at',
        'updated_at',
        'created_by'
    ];

    protected $useTimestamps = true;
}
