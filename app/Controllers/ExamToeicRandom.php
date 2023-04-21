<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ExamPartModel;
use App\Models\QuestionAnswerModel;
use App\Models\QuestionAudioModel;
use App\Models\QuestionGroupModel;
use App\Models\QuestionImageModel;
use App\Models\QuestionModel;

class ExamToeicRandom extends BaseController
{
    public function index()
    {

        $ExamPartModel = new ExamPartModel();
        $exam_part = $ExamPartModel->findAll();

        $part1 = $ExamPartModel->where('part_number', 1)->orderBy('RAND()')->findAll();
        $part2 = $ExamPartModel->where('part_number', 2)->orderBy('RAND()')->findAll();
        $part3 = $ExamPartModel->where('part_number', 3)->orderBy('RAND()')->findAll();
        $part4 = $ExamPartModel->where('part_number', 4)->orderBy('RAND()')->findAll();
        $part5 = $ExamPartModel->where('part_number', 5)->orderBy('RAND()')->findAll();
        $part6 = $ExamPartModel->where('part_number', 6)->orderBy('RAND()')->findAll();
        $part7 = $ExamPartModel->where('part_number', 7)->orderBy('RAND()')->findAll();
        $data['part1'] = $part1;
        $data['part2'] = $part2;
        $data['part3'] = $part3;
        $data['part4'] = $part4;
        $data['part5'] = $part5;
        $data['part6'] = $part6;
        $data['part7'] = $part7;


        $QuestionGroupModel = new QuestionGroupModel();
        $group6 = $QuestionGroupModel->where('exam_part_id', $part6[0]['id'])->orderBy('RAND()')->findAll(4);
        $group7 = $QuestionGroupModel->where('exam_part_id', $part7[0]['id'])->orderBy('RAND()')->findAll(15);
        $data['group6'] = $group6;
        $data['group7'] = $group7;

        $QuestionModel = new QuestionModel();
        $question = $QuestionModel->findAll();
        $question1 = $QuestionModel->where('exam_part_id', $part1[0]['id'])->findAll(6);
        //$question1 = $QuestionModel->where('exam_part_id', $part1[0]['id'])->orderBy('RAND()')->findAll(6);
        $question2 = $QuestionModel->where('exam_part_id', $part2[0]['id'])->findAll(25);
        $question3 = $QuestionModel->where('exam_part_id', $part3[0]['id'])->findAll(39);
        $question4 = $QuestionModel->where('exam_part_id', $part4[0]['id'])->findAll(30);
        $question5 = $QuestionModel->where('exam_part_id', $part5[0]['id'])->orderBy('RAND()')->findAll(30);
        $question6 = $QuestionModel->where('exam_part_id', $part6[0]['id'])->findAll();
        $question7 = $QuestionModel->where('exam_part_id', $part7[0]['id'])->findAll();
        $data['question'] = $question;
        $data['question1'] = $question1;
        $data['question2'] = $question2;
        $data['question3'] = $question3;
        $data['question4'] = $question4;
        $data['question5'] = $question5;
        $data['question6'] = $question6;
        $data['question7'] = $question7;

        $QuestionAudioModel = new QuestionAudioModel();
        $audios = $QuestionAudioModel->findAll();
        $data['audios'] = $audios;


        $QuestionAnswerModel = new QuestionAnswerModel();
        $question_answer = $QuestionAnswerModel->findAll();
        $data['question_answer'] = $question_answer;

        $QuestionImageModel = new QuestionImageModel();
        $question_image = $QuestionImageModel->findAll();
        $data['question_image'] =  $question_image;


        return view('User/Exam/ExamToeicRandom', $data);
    }
}
