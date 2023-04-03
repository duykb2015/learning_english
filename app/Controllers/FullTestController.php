<?php

namespace App\Controllers;

class FullTestController extends BaseController
{
    public function index()
    {
        return view('User/Exam/fullTestListen');
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
