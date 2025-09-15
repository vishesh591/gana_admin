<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'name',
        'email',
        'password',
        'profile_picture',
        'company_name',
        'primary_label_name',
        'phone',
        'label',
        'user_name',
        'account_number',
        'ifsc_code',
        'holder_name',
        'branch_name',
        'agreement_start_date',
        'agreement_end_date',
        'agreement_document',
        'role_id',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get user by email including role name.
     */
    public function getUserWithRoleByEmail(string $email)
    {
        return $this->select('users.*, roles.role_name as role_name')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->where('users.email', $email)
            ->groupStart()
            ->whereIn('users.role_id', [1, 2])
            ->orGroupStart()
            ->where('users.agreement_end_date >=', date('Y-m-d'))
            ->groupEnd()
            ->groupEnd()
            ->first();
    }
}
