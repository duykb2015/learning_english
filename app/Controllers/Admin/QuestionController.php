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

    public function save()
    {
        echo "<pre>";
        print_r($this->request->getFiles());
        die;
    }

    public function upload_excel()
    {
        return view('Admin/Question/upload_excel');
    }
   
}
