<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Migrations\QuestionAudio;
use App\Libraries\Upload;
use App\Models\ExamPartModel;
use App\Models\QuestionAnswerModel;
use App\Models\QuestionAudioModel;
use App\Models\QuestionGroupModel;
use App\Models\QuestionImageModel;
use App\Models\QuestionModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Question extends BaseController
{
    public function index()
    {
        $questionModel = new QuestionModel();
        $questions = $questionModel->findAll();
        $data['questions'] = $questions;

        return view('Admin/Question/index', $data);
    }
    public function detail()
    {
        $questionID = $this->request->getUri()->getSegment(4);
        $examPartModel = new ExamPartModel();
        $data['examPart'] = $examPartModel->findAll();
        if (!$questionID) return view('Admin/Question/detail', $data);

        $questionModel = new QuestionModel();
        $question = $questionModel->where('id', $questionID)->first();
        if ($questionID && !$question) {
            return redirect()->to('/dashboard/question/');
        }
       
        $questionAnswerModel = new QuestionAnswerModel();
        $questionAnswer = $questionAnswerModel->where('question_id', $questionID)->findAll();
        $questionImageModel = new QuestionImageModel();
        $questionAudioModel = new QuestionAudioModel();
        $data['image'] =  $questionImageModel->where('question_id', $question['id'])->first();
        $data['audio'] =  $questionAudioModel->where('id', $question['audio_id'])->first();
        
        $data['question'] = $question;
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
        $oldAudioID    = $this->request->getPost('old_audio_id');
        $oldImageID    = $this->request->getPost('old_image_id');
        $data = [
            'exam_part_id' => $partID,
            'type'         => $type,
            'right_option' => $rightOption,
            'question'     => $question,
            'explain'      => 'No explain',
        ];

        $uploader = new Upload();

        $questionAudio = $this->request->getFile('question_audio');
        if (0 == $questionAudio->getError())
        {
            $audioName = $uploader->audio($questionAudio);
            if ($audioName)
            {
                $questionAudioModel = new QuestionAudioModel();
                $audioData = [
                    'audio_name' => $audioName
                ];
                if ($oldAudioID) {
                    $audioName = $questionAudioModel->select('audio_name')->where('id', $oldAudioID)->first();
                    unlink(AUDIO_PATH . '/' . $audioName['audio_name']);
                    $audioData['id'] = $oldAudioID;
                }
                $questionAudioModel->save($audioData);
                if ($questionAudioModel->getInsertID() != 0) {
                    $data['audio_id '] = $questionAudioModel->getInsertID();
                }
            }
        }

        if ($oldOptionsID) {
            $data['id'] = $oldQuestionID;
        }

        $questionModel = new QuestionModel();
        $questionModel->save($data);
        unset($data);

        $questionImage = $this->request->getFile('question_image');

        if ($oldOptionsID) {
            foreach ($oldOptionsID as $key => $oldID) {
                $data[] = [
                    'id' => $oldID,
                    'text' => $options[$key]
                ];
            }
            $questionAnswerModel = new QuestionAnswerModel();
            $questionAnswerModel->updateBatch($data, 'id');


            if (0 == $questionImage->getError())
            {
                if ($uploader->validation_image($questionImage->getName()))
                {
                    $imageName = $uploader->singleImages($questionImage);

                    $imgData = [
                        'image_name' => $imageName
                    ];

                    $questionImageModel = new QuestionImageModel();
                    if ($oldImageID)
                    {
                        $imgData['id'] = $oldImageID;
                        $imgName = $questionImageModel->select('image_name')->where('id', $oldImageID)->first();
                        @unlink(IMAGE_PATH . '/' . $imgName['image_name']);
                    }
                    $questionImageModel->save($imgData);
                }
            }
            return redirect()->to('dashboard/question');
        }

        $questionID = $questionModel->getInsertID();

        if (0 == $questionImage->getError())
        {
            if ($uploader->validation_image($questionImage->getName()))
            {
                $imageName = $uploader->singleImages($questionImage);

                $imgData = [
                    'question_id' => $questionID,
                    'image_name' => $imageName
                ];

                $questionImageModel = new QuestionImageModel();
                $questionImageModel->save($imgData);
            }
        }

        foreach ($options as $option) {
            $data[] = [
                'question_id ' => $questionID,
                'text'         => $option
            ];
        }
        $questionAnswerModel = new QuestionAnswerModel();
        $questionAnswerModel->insertBatch($data);

        return redirect()->to('dashboard/question');
    }

    public function uploadExcel()
    {
        return view('Admin/Question/Upload/upload_excel');
    }

    public function uploadExcelSave()
    {
        $allFiles = $this->request->getFiles();
        $fileExcel = $allFiles['file_excel'][0];
		$audioFile = $allFiles['question_audios'];
		$imageFile = $allFiles['question_images'];


        if (0 != $fileExcel->getError()) return redirectWithMessage('dashboard/question/upload-excel', 'Không thể tải lên tệp, thử lại sau!');
        if (!$fileExcel->isValid() || $fileExcel->hasMoved()) {
            return false;
        }

        // $newName = $fileExcel->getRandomName();
        $fileName = '1682349310_b859165ee3e113dbbc5e.xlsx';
        // $fileExcel->move(UPLOAD_PATH, $newName);

        $reader = IOFactory::createReader("Xlsx");
		$spreadSheet = $reader->load(UPLOAD_PATH . '/' . $fileName);

        if (!$spreadSheet) return redirectWithMessage('dashboard/question/upload-excel', 'Có lỗi xảy ra, thử lại sau!');

		if ($spreadSheet->getSheetCount() != 8)
		{
			unlink(UPLOAD_PATH . '/' . $fileName);
			return redirectWithMessage('dashboard/question/upload-excel', 'File exel không đúng định dạng');
		}
		$arrayCheck = ['image', 'audio', 'paragraph', 'question', 'option1', 'option2', 'option3', 'option4', 'correctanswer'];
		for ($i = 0; $i < 8; $i++) {
			$validateSheet = $spreadSheet->getSheet($i)->rangeToArray('A1:I1');
			if (0 != array_diff($arrayCheck, $validateSheet[0]))
			{
				unlink(UPLOAD_PATH . '/' . $fileName);
				return redirectWithMessage('dashboard/question/upload-excel', 'File exel không đúng định dạng');
			}
		}

		
		
        
        return redirect()->to('dashboard/question');
    }
	

}
