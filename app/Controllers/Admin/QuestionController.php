<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class QuestionController extends BaseController
{
    public function index()
    {
        return view('Admin/Question/index');
    }
    public function detail()
    {
        return view('Admin/Question/detail');
    }

    public function upload_excel()
    {
        return view('Admin/Question/upload_excel');
    }
    public function group_question()
    {
        return view('Admin/Question/group_question');
    }
    public function group_question_detail()
    {
        return view('Admin/Question/group_question_detail');
    }
}
