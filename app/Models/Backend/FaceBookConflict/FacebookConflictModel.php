<?php

namespace App\Models\Backend\FaceBookConflict;

use CodeIgniter\Model;
use App\Models\ConflictCountryModel;

class FacebookConflictModel extends Model
{
    protected $table = 'g_facebook_conflicts';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'reference_copyright_id',
        'reference_copyright_creation_date',
        'reference_copyright_artist',
        'reference_copyright_title',
        'reference_copyright_isrc',
        'reference_copyright_match_count',
        'conflict_id',
        'conflict_type',
        'conflict_creation_date',
        'conflict_modification_date',
        'conflict_state',
        'other_party_name',
        'other_party_reference_copyright_id',
        'other_party_reference_copyright_artist',
        'other_party_reference_copyright_title',
        'other_party_reference_copyright_isrc',
        'last_28_days_view_count',
        'reference_overlap_percentage',
        'reference_overlap_duration_ms',
        'conflict_category',
        'reference_copyright_version_title',
        'other_party_reference_copyright_version_title',
        'conflict_expiration_date',
        'reference_asset_id',
        'other_party_reference_overlap_percentage',
        'other_party_reference_overlap_duration_ms',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    // Relations (pseudo for easier querying)
    public function countries()
    {
        return $this->hasMany(ConflictCountryModel::class, 'conflict_id', 'id');
    }
}
