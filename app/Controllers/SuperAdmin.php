<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SuperAdmin extends BaseController
{
    public function sales_report()
    {
        $page_array = array();
        $page_array['file_name'] = 'sales-report';
        return view('superadmin/index', $page_array);
    }

    public function support_user()
    {
        $page_array = array();
        $page_array['file_name'] = 'support_user';
        return view('superadmin/index', $page_array);
    }

}
