<?php

namespace App\Repositories\Register;

use App\Models\UserModel;

class RegisterRepository
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /** Create a new user */
    public function register(array $data)
    {
        return $this->userModel->insert($data);
    }
}
