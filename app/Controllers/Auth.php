<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // If already logged in, redirect to dashboard based on role
        if (session()->get('isLoggedIn')) {
            $role = session()->get('user')['role'];
            return redirect()->to('/' . strtolower($role));
        }

        return view('auth/login');
    }

    public function loginCheck()
    {
        $email = trim($this->request->getPost('email'));
        $password = trim($this->request->getPost('password'));
        $user = $this->userModel->getUserWithRoleByEmail($email);

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Invalid Email.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid Password.');
        }

        // Save session
        session()->set([
            'isLoggedIn' => true,
            'user'       => [
                'id'       => $user['id'],
                'email'    => $user['email'],
                'role'     => strtolower($user['role_name']),
                'role_id'  => $user['role_id'],
                'name'     => $user['user_name'],
                'profile_image' => $user['profile_picture'],
                'primary_label_name' => $user['primary_label_name'],
            ]
        ]);

        // If "Remember Me" checked → set cookie
        if ($this->request->getPost('remember')) {
            setcookie('remember_email', $email, time() + (86400 * 30), "/"); // 30 days
        }

        // Redirect based on role
        return redirect()->to('/' . strtolower($user['role_name']));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
