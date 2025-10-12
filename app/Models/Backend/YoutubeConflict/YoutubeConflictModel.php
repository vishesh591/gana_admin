<?php

namespace App\Models\Backend\YoutubeConflict;

use CodeIgniter\Model;

class YoutubeConflictModel extends Model
{
    protected $table = 'g_youtube_conflicts';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'issue_id','issue_type','other_party','expiry_date','expiry_time',
        'asset_name','asset_type','asset_created_on','asset_id','reference_id',
        'isrc','upc','custom_id','labels','iswc','overlapping_asset_id',
        'overlapping_asset_name','video_id','video_title','channel_name','channel_id',
        'claim_id','match_type','engaged_views_affected_daily','engaged_views_lifetime',
        'claimed_videos_affected','duration_time_seconds','duration_percentage_reference',
        'duration_percentage_video','status','status_detail','link_to_issue','resolution_rights_owned','resolution_date'
        ,'supporting_document_path','resolution_status','rejection_message','created_by'
    ];
}