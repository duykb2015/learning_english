<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\PostsModel;
use Exception;


class Posts extends BaseController
{
    public function index()
    {
        $postsModel = new PostsModel();
        $posts = $postsModel->paginate(10);

        $datas['posts'] = $posts;
        return view('Admin/Posts/index', $datas);
    }

    public function detail()
    {
        return view('Admin/Posts/detail');
    }

    public function save()
    {
        $author = session()->get('id');

        $title = $this->request->getPost('title');
        $slug = $this->request->getPost('slug');
        $description = $this->request->getPost('description');
        $content = $this->request->getPost('content');
        $datas = [
            'author' => $author,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'content' => $content,
            //status
        ];
        $postsModel = new PostsModel();

        $isInsert = $postsModel->insert($datas);
        if (!$isInsert) {
            throw new Exception(UNEXPECTED_ERROR_MESSAGE);
        }
        return redirect()->to('dashboard/posts/detail');
    }

    public function delete()
    {
        $id = $this->request->getUri()->getSegment(4);

        $postsModel = new PostsModel();
        $postsModel->delete($id);
        return redirect()->to('dashboard/posts');
    }
    public function edit()
    {
        $a = current_url(true);
        $uri = new \CodeIgniter\HTTP\URI($a);
        $id = $uri->getSegment(4);


        $postsModel = new PostsModel();
        $posts = $postsModel->find($id);
        $datas['posts'] = $posts;
        return view('Admin/Posts/edit', $datas);
    }
    public function update()
    {
        $a = current_url(true);
        $uri = new \CodeIgniter\HTTP\URI($a);
        $id = $uri->getSegment(4);

        $postsModel = new PostsModel();
        $postsModel->find($id);

        $adminModel = new AdminModel();
        $admin = $adminModel->paginate(10);
        $author = $admin['0']['id'];

        $title = $this->request->getPost('title');
        $slug = $this->request->getPost('slug');
        $description = $this->request->getPost('description');
        $content = $this->request->getPost('content');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $updated_at = date('Y-m-d H:i:s');
        $datas = [
            'author' => $author,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'content' => $content,
            'updated_at' => $updated_at
        ];
        $postsModel->update($id, $datas);
        return redirect()->to('dashboard/posts');
    }
}
