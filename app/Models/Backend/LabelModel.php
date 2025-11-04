<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class LabelModel extends Model
{
    protected $table      = 'labels';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'label_name',
        'primary_label_name',
        'logo',
        'user_id',
        'created_at',
        'updated_at',
        'user_id',
        'created_by',
        'status',
        'updated_by',
        'label_document',
    ];

    protected $useTimestamps = true;

    public function getLabelsByUser($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}
