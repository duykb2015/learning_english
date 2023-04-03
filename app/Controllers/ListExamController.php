<?php

namespace App\Controllers;

class ListExamController extends BaseController
{
    public function index()
    {
        return view('User/listexam/listexam');
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
