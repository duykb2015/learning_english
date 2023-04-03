<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function index()
    {
        return view('Admin/Category/index');
    }

    public function detail()
    {
        return view('Admin/Category/detail');
    }
}
