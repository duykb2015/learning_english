<?php

namespace App\Controllers;

class Exam extends BaseController
{
    public function index()
    {
        return view('User/Exam/index');
    }
    public function Testlisten()
    {
        return view('User/Exam/fullTestListen');
    }
    public function TestRead()
    {
        return view('User/Exam/fullTestReading');
    }

}
