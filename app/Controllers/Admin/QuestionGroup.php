<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ExamPartModel;
use App\Models\QuestionGroupModel;
use Exception;

class QuestionGroup extends BaseController
{
    public function index()
    {
        $questionGroupModel = new QuestionGroupModel();
        $questionGroups = $questionGroupModel->paginate(10);

        $datas['questionGroups'] = $questionGroups;
        return view('Admin/Question/Group/index', $datas);
    }
    public function detail()
    {
        $examPartModel = new ExamPartModel();
        $datas['examPart'] = $examPartModel->findAll();
        return view('Admin/Question/Group/detail', $datas);
    }

    public function create()
    {
        //Lấy dữ liệu post từ các field input trong form. Với method post
        $title       = $this->request->getPost('title');
        $status      = $this->request->getPost('status');
        $part_number = $this->request->getPost('part_number');
        $paragraph   = $this->request->getPost('paragraph');

        //Sắp xếp dữ liệu vào mảng để thêm vào database. 
        //Chỉ mục của mảng là tên của các cột  trong table
        $datas = [
            'exam_part_id' => $part_number,
            'title'        =>  $title,
            'status'       =>  $status,
            'paragraph'    =>  $paragraph,
        ];

        //Khởi tạo model
        $questionGroupModel = new QuestionGroupModel();

        //Thêm dữ liệu
        $isInsert = $questionGroupModel->insert($datas);
        if (!$isInsert) {
            throw new Exception(UNEXPECTED_ERROR_MESSAGE);
        }

        //Sau khi thêm thì chuyển hướng về trang index.
        return redirect()->to('dashboard/question-group');
    }
}
