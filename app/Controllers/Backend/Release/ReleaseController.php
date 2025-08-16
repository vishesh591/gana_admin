<?php

namespace App\Controllers\Backend\Release;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ReleaseController extends BaseController
{
    public function create()
    {
        return view('superadmin/index', [
            'file_name' => 'add-release'
        ]);
    }
}
