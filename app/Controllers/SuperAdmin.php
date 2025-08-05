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

    public function claiming_data()
    {
        $page_array = array();
        $page_array['file_name'] = 'claiming-data';
        return view('superadmin/index', $page_array);
    }

    public function relocation_data()
    {
        $page_array = array();
        $page_array['file_name'] = 'relocation-data';
        return view('superadmin/index', $page_array);
    }

    public function merge_data()
    {
        $page_array = array();
        $page_array['file_name'] = 'merge-data';
        return view('superadmin/index', $page_array);
    }

    public function ownership_data()
    {
        $page_array = array();
        $page_array['file_name'] = 'ownership-data';
        return view('superadmin/index', $page_array);
    }

    public function releases()
    {
        $page_array = array();
        $page_array['file_name'] = 'releases';
        return view('superadmin/index', $page_array);
    }

    public function artists()
    {
        $page_array = array();
        $page_array['file_name'] = 'artists';
        return view('superadmin/index', $page_array);
    }

    public function labels()
    {
        $page_array = array();
        $page_array['file_name'] = 'labels';
        return view('superadmin/index', $page_array);
    }

    public function sales_report()
    {
        $page_array = array();
        $page_array['file_name'] = 'sales-report';
        return view('superadmin/index', $page_array);
    }

    public function claiming_request()
    {
        $page_array = array();
        $page_array['file_name'] = 'claiming-req';
        return view('superadmin/index', $page_array);
    }

    public function relocation_request()
    {
        $page_array = array();
        $page_array['file_name'] = 'relocation-req';
        return view('superadmin/index', $page_array);
    }

    public function merge_request()
    {
        $page_array = array();
        $page_array['file_name'] = 'merge-req';
        return view('superadmin/index', $page_array);
    }

    public function youtube()
    {
        $page_array = array();
        $page_array['file_name'] = 'youtube';
        return view('superadmin/index', $page_array);
    }

    public function facebook()
    {
        $page_array = array();
        $page_array['file_name'] = 'facebook';
        return view('superadmin/index', $page_array);
    }
}
