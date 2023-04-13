<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ExamPartModel;
use App\Models\QuestionAnswerModel;
use App\Models\QuestionModel;

class Question extends BaseController
{
    public function index()
    {
        $questionModel = new QuestionModel();
        $questions = $questionModel->where('question_group_id', null)->findAll();
        $data['questions'] = $questions;

        return view('Admin/Question/index', $data);
    }
    public function detail()
    {
        $questionID = $this->request->getUri()->getSegment(4);

        $questionModel = new QuestionModel();
        $examPartModel = new ExamPartModel();
        $question = $questionModel->where('id', $questionID)->first();
        if ($questionID && !$question) {
            return redirect()->to('/dashboard/question/');
        }
        $questionAnswerModel = new QuestionAnswerModel();
        $questionAnswer = $questionAnswerModel->where('question_id', $questionID)->findAll();
        $data['question'] = $question;
        $data['examPart'] = $examPartModel->findAll();
        $data['questionAnswer'] = $questionAnswer;

        return view('Admin/Question/detail', $data);
    }

    public function save()
    {
        $oldQuestionID = $this->request->getPost('id');
        $partID        = $this->request->getPost('part_id');
        $question      = $this->request->getPost('question');
        $type          = $this->request->getPost('type');
        $rightOption   = $this->request->getPost('right_option');
        $oldOptionsID  = $this->request->getPost('old_options_id');
        $options       = $this->request->getPost('options');

        $data = [
            'exam_part_id'      => $partID,
            'right_option'      => $rightOption,
            'question'          => $question,
            'explain'           => 'No explain',
        ];

        if (1 == $type) {
        }

        if ($oldOptionsID) {
            $data['id'] = $oldQuestionID;
        }

        $questionModel = new QuestionModel();
        $questionModel->save($data);
        unset($data);

        $questionID = $questionModel->getInsertID();
        if ($oldOptionsID) {
            $questionID = $oldQuestionID;
        }

        foreach ($oldOptionsID as $key => $oldID) {
            $data[] = [
                'id' => $oldID,
                'text' => $options[$key]
            ];
        }
        $questionAnswerModel = new QuestionAnswerModel();
        $questionAnswerModel->updateBatch($data, 'id');

        return redirect()->to('dashboard/question');
    }

    public function upload_excel()
    {
        return view('Admin/Question/Upload/upload_excel');
    }
}
