<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function Infor()
    {
        return view('User/inforUser/profile');
    }
    public function Result()
    {
        return view('User/Results/readingResult');
    }
}
