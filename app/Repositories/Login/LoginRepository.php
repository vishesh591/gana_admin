<?php

namespace App\Repositories\Login;

use App\Models\UserModel;

class LoginRepository
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /** Create a new user */
    public function create(array $data)
    {
        return $this->userModel->insert($data);
    }

    /** Get all users */
    public function all()
    {
        return $this->userModel->findAll();
    }

    /** Find user by ID */
    public function findByEmail($email)
    {
        return $this->userModel->where('email',$email)->first();
    }

    /** Update user by ID */
    public function update(int $id, array $data)
    {
        return $this->userModel->update($id, $data);
    }

    /** Delete user by ID */
    public function delete(int $id)
    {
        return $this->userModel->delete($id);
    }
}
