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
        }

        // If not logged in
        return redirect()->to('/login');
    }
}
