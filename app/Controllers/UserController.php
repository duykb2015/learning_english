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
    public function Login()
    {
        return view('User/inforUser/Login');
    }
    public function Register()
    {
        return view('User/inforUser/Register');
    }
}
