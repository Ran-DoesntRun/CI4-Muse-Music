<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        return view('/admin/login');
    }

    public function register()
    {
        return view('/admin/register', ['title' => 'REGISTER']);
    }
}

