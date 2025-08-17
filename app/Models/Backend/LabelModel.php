<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class LabelModel extends Model
{
    protected $table      = 'labels';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'label_name',
        'primary_label',
        'profile_image',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}
