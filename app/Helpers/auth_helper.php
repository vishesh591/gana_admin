<?php

use App\Models\RoleModel;

if (!function_exists('getRoleNameById')) {
    function getRoleNameById($roleId)
    {
        if (!$roleId) return null;

        $roleModel = new RoleModel();
        $role = $roleModel->find($roleId);

        return $role ? $role['role_name'] : null;
    }
}


if (!function_exists('getUserRoleSlug')) {
    function getUserRoleSlug()
    {
        $session = session();
        $user = $session->get('user'); // adjust key as per your session data

        if (!$user || !isset($user['role'])) {
            return null;
        }

        return $roleMap[$user['role']] ?? $user['role'];
    }
}
