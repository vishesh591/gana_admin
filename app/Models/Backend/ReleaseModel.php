<?php

namespace App\Models;

use CodeIgniter\Model;

class ReleaseModel extends Model
{
    protected $table = 'g_release';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title','label_id','release_type','mood_type','genre_type','upc_ean',
        'language','artwork','track_title','secondary_track_type','instrumental',
        'isrc','author','composer','remixer','arranger','music_producer','publisher',
        'c_line_year','c_line','p_line_year','p_line','production_year',
        'track_title_language','explicit_song','lyrics','audio_file','stores_ids',
        'rights_management_options','release_date','pre_sale_date','original_release_date',
        'release_price','sale_price','t_and_c','created_at','updated_at'
    ];
}
