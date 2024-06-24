<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class WelcomeController extends BaseController
{
    public function index()
    {
        echo "Hello World";
    }
    
    public function first_view() {
        return view('welcome_view');
    }
}
