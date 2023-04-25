<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\PostsModel;

class BlogController extends BaseController
{
    public function index()
    {

        $PostsModel= new PostsModel();
        $posts=$PostsModel->findAll();
        $data['posts']=$posts;
        return view('User/Blog/index',$data);
    }
    public function detail()
    {   $id = $this->request->getUri()->getSegment(3);
        $PostsModel= new PostsModel();
        $posts=$PostsModel->where('id', $id)->find();
        $data['posts']=$posts;

        $CategoryModel =new CategoryModel();
        $category=$CategoryModel->where('id',$posts[0]['category_id'])->find();
        $data['category']=$category;

        $AdminModel=new AdminModel();
        $admin=$AdminModel->where('id',$posts[0]['author'])->find();
        $data['admin']=$admin;
        return view('User/Blog/detail',$data);
    }

}
