<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Exam extends BaseController
{
    public function index()
    {
        return view('Admin/Exam/index');
    }
    public function detail()
    {
        return view('Admin/Exam/detail');
    }
    
}
