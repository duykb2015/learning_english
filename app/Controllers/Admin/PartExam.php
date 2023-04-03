<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PartExam extends BaseController
{
    public function index()
    {
        return view('Admin/Exam/Part/index');
    }
    public function detail()
    {
        
        return view('Admin/Exam/Part/detail');
    }
    public function save()
    {
        # code...
    }
}
