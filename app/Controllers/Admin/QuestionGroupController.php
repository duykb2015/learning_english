<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class QuestionGroupController extends BaseController
{
    public function index()
    {
        return view('Admin/Question/Question_Group/index');
    }
    public function detail()
    {
        return view('Admin/Question/Question_Group/detail');
    }
}
