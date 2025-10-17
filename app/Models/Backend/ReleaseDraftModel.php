<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class ReleaseDraftModel extends Model
{
    protected $table = 'g_release_drafts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    
    protected $allowedFields = [
        'user_id', 'draft_name', 'release_id', 'current_step', 'completion_percentage','release_id',
        // Step 1 - Metadata
        'title', 'label_id', 'artist_id', 'featuring_artist_id', 'release_type', 
        'mood_type', 'genre_type', 'upc_ean', 'language', 'artwork',
        // Step 2 - Track Information
        'track_title', 'secondary_track_type', 'instrumental', 'isrc', 'author',
        'composer', 'remixer', 'arranger', 'music_producer', 'publisher',
        'c_line_year', 'c_line', 'p_line_year', 'p_line', 'production_year',
        'track_title_language', 'explicit_song', 'lyrics', 'audio_file',
        // Step 3 - Stores
        'stores_ids', 'rights_management',
        // Step 4 - Dates & Pricing (FIXED: Match migration fields)
        'release_date', 'pre_sale_date', 'original_release_date', 
        'release_price', 'sale_price',
        'content_guidelines', 'isrc_guidelines', 'youtube_guidelines', 
        'audio_store_guidelines',
        'form_data_json', 'created_at', 'updated_at','created_by'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'user_id' => 'required|integer',
        'draft_name' => 'permit_empty|max_length[255]',
        'current_step' => 'permit_empty|integer|in_list[1,2,3,4,5]',
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;


    public function getUserDrafts($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('updated_at', 'DESC')
                    ->findAll();
    }

    public function getDraftByUserAndId($userId, $draftId)
    {
        return $this->where(['user_id' => $userId, 'id' => $draftId])
                    ->first();
    }

    public function deleteDraftFiles($draft)
    {
        // Delete associated files
        if (!empty($draft['artwork']) && file_exists($draft['artwork'])) {
            unlink($draft['artwork']);
        }
        if (!empty($draft['audio_file']) && file_exists($draft['audio_file'])) {
            unlink($draft['audio_file']);
        }
    }
}
