<?php

namespace App\Controllers;

class BlogController extends BaseController
{
    public function index()
    {
        return view('User/Blog/index');
    }
    public function detail()
    {
        return view('User/Blog/detail');
    }

}
