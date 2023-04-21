<?php

namespace App\Controllers;

use App\Models\ExamPartModel;
use App\Models\QuestionAnswerModel;
use App\Models\QuestionAudioModel;
use App\Models\QuestionGroupModel;
use App\Models\QuestionImageModel;
use App\Models\QuestionModel;

class PracticeController extends BaseController
{

    public function PracticeGrammar()
    {
        return view('User/Practice/practicegrammar');
    }
    public function PracticeVocabulary()
    {
        return view('User/Practice/practiceVocabulary');
    }
    public function PracticeListen()
    {
        $ExamPartModel = new ExamPartModel();
        $part1 = $ExamPartModel->where('part_number', 1)->orderBy('RAND()')->findAll();
        $part2 = $ExamPartModel->where('part_number', 2)->orderBy('RAND()')->findAll();
        $part3 = $ExamPartModel->where('part_number', 3)->orderBy('RAND()')->findAll();
        $part4 = $ExamPartModel->where('part_number', 4)->orderBy('RAND()')->findAll();
        $data['part1'] = $part1;
        $data['part2'] = $part2;
        $data['part3'] = $part3;
        $data['part4'] = $part4;



        return view('User/Practice/practiceListen', $data);
    }
    public function PracticeRead()
    {
        $ExamPartModel = new ExamPartModel();
        $part5 = $ExamPartModel->where('part_number', 5)->orderBy('RAND()')->findAll();
        $part6 = $ExamPartModel->where('part_number', 6)->orderBy('RAND()')->findAll();
        $part7 = $ExamPartModel->where('part_number', 7)->orderBy('RAND()')->findAll();
        $data['part5'] = $part5;
        $data['part6'] = $part6;
        $data['part7'] = $part7;
        return view('User/Practice/practiceRead', $data);
    }
    public function Listen()
    {
        // tim id part
        $part_id = $this->request->getUri()->getSegment(3);
        $ExamPartModel = new ExamPartModel();
        $part = $ExamPartModel->where('id', $part_id)->findAll();
        $data['part'] = $part;
        // lay question
        $QuestionModel = new QuestionModel();
        if ($part[0]['part_number'] == 1) {
            $question = $QuestionModel->where('exam_part_id', $part_id)->findAll(6);
        } elseif ($part[0]['part_number']== 2) {
            $question = $QuestionModel->where('exam_part_id', $part_id)->findAll(25);
        } elseif ($part[0]['part_number'] == 3) {
            $question = $QuestionModel->where('exam_part_id', $part_id)->findAll(39);
        } elseif ($part[0]['part_number'] == 4) {
            $question = $QuestionModel->where('exam_part_id', $part_id)->findAll(30);
        }
        $data['question'] = $question;
        // lay dap an
        $QuestionAnswerModel = new QuestionAnswerModel();
        $question_answer = $QuestionAnswerModel->findAll();
        $data['question_answer'] = $question_answer;

        // lay audios
        $QuestionAudioModel = new QuestionAudioModel();
        $QuestionAudio = $QuestionAudioModel->findAll();
        $audios = [];
        foreach ($question as $a) {
            foreach ($QuestionAudio as $b) {
                if ($a['audio_id'] == $b['id']) {
                    array_push($audios, $b);
                }
            }
        }
        $data['audios'] =  $audios;

        //lay image
        $QuestionImageModel = new QuestionImageModel();
        $question_image = $QuestionImageModel->findAll();
        $data['question_image'] =  $question_image;

        return view('User/Practice/baiTapNghe', $data);
    }
    public function Read()
    {
        // tim id part
        $part_id = $this->request->getUri()->getSegment(3);
        $ExamPartModel = new ExamPartModel();
        $part = $ExamPartModel->where('id', $part_id)->findAll();
        $data['part'] = $part;

        //lay group
        $QuestionGroupModel = new QuestionGroupModel();
        if($part[0]['part_number'] == 6){
            $groups = $QuestionGroupModel->where('exam_part_id', $part_id)->orderBy('RAND()')->findAll(4);

        }elseif($part[0]['part_number']==7 ){
            $groups = $QuestionGroupModel->where('exam_part_id', $part_id)->orderBy('RAND()')->findAll(15);

        }else{
            $groups =[];
        }
        $data['groups'] = $groups;
        // lay question
        $QuestionModel = new QuestionModel();
        if ($part[0]['part_number'] == 5) {
            $question = $QuestionModel->where('exam_part_id', $part_id)->orderBy('RAND()')->findAll(30);
        } elseif ($part[0]['part_number']== 6) {
            $question = $QuestionModel->where('exam_part_id', $part_id)->findAll();
        } elseif ($part[0]['part_number'] == 7) {
            $question = $QuestionModel->where('exam_part_id', $part_id)->findAll();
        }
        $data['question'] = $question;
        // lay dap an
        $QuestionAnswerModel = new QuestionAnswerModel();
        $question_answer = $QuestionAnswerModel->findAll();
        $data['question_answer'] = $question_answer;
        return view('User/Practice/baiTapDoc', $data);

    }
}
