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


if (!function_exists('user_has_role')) {
    function user_has_role($allowedRoles = [])
    {
        $user = session()->get('user');
        $userRole = strtolower($user['role'] ?? '');
        return in_array($userRole, (array)$allowedRoles);
    }
}

if (!function_exists('get_user_role')) {
    function get_user_role()
    {
        $user = session()->get('user');
        return strtolower($user['role'] ?? '');
    }
}

if (!function_exists('is_admin')) {
    function is_admin()
    {
        return user_has_role(['superadmin', 'subadmin']);
    }
}

if (!function_exists('is_content_creator')) {
    function is_content_creator()
    {
        return user_has_role(['superadmin', 'distributor', 'label']);
    }
}