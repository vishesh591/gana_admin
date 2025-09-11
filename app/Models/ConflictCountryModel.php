<?php

namespace App\Models;

use CodeIgniter\Model;

class ConflictCountryModel extends Model
{
    protected $table = 'g_conflict_countries';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'conflict_id',
        'country_id',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
}