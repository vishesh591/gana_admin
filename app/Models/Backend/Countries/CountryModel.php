<?php

namespace App\Models\Backend\Countries;

use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table = 'g_countries';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'short_name',
        'iso2',
        'iso3',
        'continent',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
}
