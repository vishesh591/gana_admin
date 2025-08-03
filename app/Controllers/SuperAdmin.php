<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SuperAdmin extends BaseController
{

    public function index()
    {
        return view('superadmin/dashboard');
    }

    public function dashboard()
    {
        $page_array = array();
        $page_array['file_name'] = 'dashboard';
        return view('superadmin/index', $page_array);
    }

    public function accounts()
    {
        $page_array = array();
        $page_array['file_name'] = 'user_list';
        return view('superadmin/index', $page_array);
    }
}
