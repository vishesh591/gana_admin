<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class SupportRequestModel extends Model
{
    protected $table = 'g_support_requests';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'full_name',
        'email',
        'subject',
        'message',
        'status'
    ];

    protected $useTimestamps = true;
}
