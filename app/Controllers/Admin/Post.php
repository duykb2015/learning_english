<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Post extends BaseController
{
    public function index()
    {
        return view('Admin/Posts/index');
    }

    public function detail()
    {
        return view('Admin/Posts/detail');
    }
}
