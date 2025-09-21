<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if ($user) {
            // Example: if role is stored as ID
            $roleName = getRoleNameById($user['role_id'] ?? null); // use your helper

            switch (strtolower($roleName)) {
                case 'superadmin':
                    return redirect()->to('/dashboard');
                case 'subadmin':
                    return redirect()->to('/dashboard');
                case 'distributor':
                    return redirect()->to('/dashboard');
                case 'label':
                    return redirect()->to('/dashboard');
                case 'artist':
                    return redirect()->to('/dashboard');
                default:
                    return redirect()->to('/unauthorized');
            }
        }

        // If not logged in
        return redirect()->to('/login');
    }
}
