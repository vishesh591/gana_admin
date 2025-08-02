<?php

namespace App\Controllers;

class Releases extends BaseController
{
    public function index()
    {
        return view('releases');
    }
}
