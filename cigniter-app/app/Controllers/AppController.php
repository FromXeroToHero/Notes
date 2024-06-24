<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AppController extends BaseController
{
    public function index()
    {
        return view('notes');
    }
}
