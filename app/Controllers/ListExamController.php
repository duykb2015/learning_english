<?php

namespace App\Controllers;

use App\Models\ExamModel;

class ListExamController extends BaseController
{
    public function index()
    {
        $ExamModel=new ExamModel();
        $exam=$ExamModel->findAll();
        $data['exam']=$exam;

        return view('User/listexam/listexam',$data);
    }

    public function listListen()
    {
        return view('User/listexam/listTestListen');
    }

    public function listRead()
    {
        return view('User/listexam/listTestRead');
    }
    public function ExamRandom()
    {
        return view('User/listexam/ExamRandom');
    }
}
