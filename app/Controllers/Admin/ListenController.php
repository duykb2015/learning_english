<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ListenController extends BaseController
{
    public function index()
    {
        return view('Admin/Listen/index');
    }
    public function detail()
    {
        return view('Admin/Listen/detail');
    }
}
