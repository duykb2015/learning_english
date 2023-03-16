<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PartExamController extends BaseController
{
    public function index()
    {
        return view('Admin/Exam/Part_Exam/index');
    }
    public function detail()
    {
        return view('Admin/Exam/Part_Exam/detail');
    }
}
