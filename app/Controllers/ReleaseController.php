<?php

namespace App\Controllers;

class ReleaseController extends BaseController
{
    public function add()
    {
        return view('add-release'); // loads app/Views/add-release.php
    }
}
