<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $user = $session->get('user'); // assuming user data is stored in session

        if (!$user) {
            return redirect()->to('/login');
        }

        // If specific roles are passed to the filter
        if ($arguments) {
            $role = $user['role'] ?? null;
            if (!in_array($role, $arguments)) {
                return redirect()->to('/unauthorized'); // or 403
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
