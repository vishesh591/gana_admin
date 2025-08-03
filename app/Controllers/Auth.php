<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function logincheck()
    {
        $email = trim($this->request->getPost('email'));
        $password = trim($this->request->getPost('password'));

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $result = $builder->getWhere(['email' => $email])->getResultArray();

        if (sizeof($result) > 0) {
            if (password_verify($password, $result[0]['password'])) {

                $roleName = getRoleNameById($result[0]['role_id']);

                $session = session();
                $session->set('isLoggedIn', 1);
                $session->set('user', [
                    'id' => $result[0]['id'],
                    'email' => $result[0]['email'],
                    'country_code' => $result[0]['country_code'],
                    'phone' => $result[0]['phone'],
                    'role_id' => $result[0]['role_id'],
                    'role' => $roleName,
                ]);

                // Redirect based on role
                switch (strtolower($roleName)) {
                    case 'superadmin':
                        return redirect()->to('/superadmin');
                    case 'subadmin':
                        return redirect()->to('/subadmin');
                    case 'distributor':
                        return redirect()->to('/distributor');
                    case 'label':
                        return redirect()->to('/label');
                    case 'artist':
                        return redirect()->to('/artist');
                    default:
                        return redirect()->to('/unauthorized');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid Password.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Email.');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('user');
        return redirect()->to('/login');
    }
}
