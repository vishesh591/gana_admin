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
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
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

        // Redirect to dashboard (NO role prefix in URL!)
        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }

    public function changePasswordAjax()
    {
        if ($this->request->isAJAX()) {
            $session = session();
            $userId  = $session->get('user.id');

            $userModel = new \App\Models\UserModel();
            $user      = $userModel->find($userId);

            $oldPassword     = $this->request->getPost('old_password');
            $newPassword     = $this->request->getPost('new_password');
            $confirmPassword = $this->request->getPost('confirm_password');

            if (!password_verify($oldPassword, $user['password'])) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Old password is incorrect.']);
            }

            if ($newPassword !== $confirmPassword) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Passwords do not match.']);
            }

            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $userModel->update($userId, ['password' => $hashedPassword]);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Password updated successfully!']);
        }
    }
}
