<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ReadController extends BaseController
{
    public function index()
    {
        return view('Admin/Read/index');
    }
    public function detail()
    {
        return view('Admin/Read/detail');
    }
}
