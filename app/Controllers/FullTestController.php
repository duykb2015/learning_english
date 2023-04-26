<?php

namespace App\Controllers;

use App\Models\ExamModel;
use App\Models\ExamPartModel;
use App\Models\ExamQuestionGroup;
use App\Models\ExamQuestionSingle;
use App\Models\ExamToExamPartModel;
use App\Models\QuestionAnswerModel;
use App\Models\QuestionAudioModel;
use App\Models\QuestionGroupModel;
use App\Models\QuestionImageModel;
use App\Models\QuestionModel;
use App\Models\WrongAnswerQuestionModel;

class FullTestController extends BaseController
{
    public function index()
    {
        //Tao cac model
        $exam_id = $this->request->getUri()->getSegment(3);
        $ExamModel = new ExamModel();
        $Exam = $ExamModel->find($exam_id);

        $ExamQuestionGroup = new ExamQuestionGroup();
        $ExamGroup = $ExamQuestionGroup->where('exam_id', $exam_id)->findAll();

        $ExamQuestionSingle = new ExamQuestionSingle();
        $ExamSingle = $ExamQuestionSingle->where('exam_id', $exam_id)->findAll();

        $ExamToExamPartModel = new ExamToExamPartModel();
        $ExamPart = $ExamToExamPartModel->where('exam_id', $exam_id)->findAll();

        //lay part
        $ExamPartModel = new ExamPartModel();
        $exam_part = $ExamPartModel->findAll();

        $part1 = $ExamPartModel->where('id', $ExamPart[0]['exam_part_id'])->find();
        $part2 = $ExamPartModel->where('id', $ExamPart[1]['exam_part_id'])->find();
        $part3 = $ExamPartModel->where('id', $ExamPart[2]['exam_part_id'])->find();
        $part4 = $ExamPartModel->where('id', $ExamPart[3]['exam_part_id'])->find();
        $part5 = $ExamPartModel->where('id', $ExamPart[4]['exam_part_id'])->find();
        $part6 = $ExamPartModel->where('id', $ExamPart[5]['exam_part_id'])->find();
        $part7 = $ExamPartModel->where('id', $ExamPart[6]['exam_part_id'])->find();
        $data['part1'] = $part1;
        $data['part2'] = $part2;
        $data['part3'] = $part3;
        $data['part4'] = $part4;
        $data['part5'] = $part5;
        $data['part6'] = $part6;
        $data['part7'] = $part7;

        //lay group 6,7
        $QuestionGroupModel = new QuestionGroupModel();
        $group = $QuestionGroupModel->where('exam_part_id', $part6[0]['id'])->findAll();
        $group6 = [];
        foreach ($ExamGroup as $a) {
            foreach ($group as $b) {
                if ($b['id'] == $a['question_group_id']) {
                    array_push($group6, $b);
                }
            }
        }
        $group = $QuestionGroupModel->where('exam_part_id', $part7[0]['id'])->findAll();
        $group7 = [];
        foreach ($ExamGroup as $a) {
            foreach ($group as $b) {
                if ($b['id'] == $a['question_group_id']) {
                    array_push($group7, $b);
                }
            }
        }
        $data['group6'] = $group6;
        $data['group7'] = $group7;

        //lay question
        $QuestionModel = new QuestionModel();
        $question = $QuestionModel->findAll();
        $question1 = [];
        $question2 = [];
        $question3 = [];
        $question4 = [];
        $question5 = [];
        $question6 = $QuestionModel->where('exam_part_id', $part6[0]['id'])->findAll();
        $question7 = $QuestionModel->where('exam_part_id', $part7[0]['id'])->findAll();

        foreach ($ExamSingle as $a) {
            foreach ($question as $b) {
                if ($b['exam_part_id'] == $part1[0]['id'] && $b['id'] == $a['question_id']) {

                    array_push($question1, $b);
                } else if ($b['exam_part_id'] == $part2[0]['id'] && $b['id'] == $a['question_id']) {

                    array_push($question2, $b);
                } else if ($b['exam_part_id'] == $part3[0]['id'] && $b['id'] == $a['question_id']) {

                    array_push($question3, $b);
                } else if ($b['exam_part_id'] == $part4[0]['id'] && $b['id'] == $a['question_id']) {

                    array_push($question4, $b);
                } else if ($b['exam_part_id'] == $part5[0]['id'] && $b['id'] == $a['question_id']) {

                    array_push($question5, $b);
                }
            }
        }
        $data['question1'] = $question1;
        $data['question'] = $question;
        $data['question2'] = $question2;
        $data['question3'] = $question3;
        $data['question4'] = $question4;
        $data['question5'] = $question5;
        $data['question6'] = $question6;
        $data['question7'] = $question7;

        //lay audios
        $QuestionAudioModel = new QuestionAudioModel();
        $audios= $QuestionAudioModel->findAll();
        $data['audios'] = $audios;


        $QuestionAnswerModel = new QuestionAnswerModel();
        $question_answer = $QuestionAnswerModel->findAll();
        $data['question_answer'] = $question_answer;

        $QuestionImageModel = new QuestionImageModel();
        $question_image = $QuestionImageModel->findAll();
        $data['question_image'] =  $question_image;
        return view('User/Exam/Exam', $data);
    }
    public function Testlisten()
    {
        return view('User/Exam/fullTestListen');
    }
    public function TestRead()
    {
        return view('User/Exam/fullTestReading');
    }
    public function InsertWrongAnswer()
    {
        //goi id user
        $user_id = session()->get('id');

        if ( ! $user_id)
        {
            return;
        }
        $question_id = $_POST['question_id'];
        $selected_answer = $_POST['selected_answer'];
        $data = [
            'user_id' => $user_id,
            'question_id' => $question_id,
            'selected_answer' => $selected_answer,
        ];
        $wrongAnswerQuestionModel = new WrongAnswerQuestionModel();
        $wrongAnswerQuestionModel->insert($data);
    }
}
