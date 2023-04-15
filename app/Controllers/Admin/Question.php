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
        pre($this->request->getFiles());
        $fileExcel = $this->request->getFile('files_excel');
        if (0 != $fileExcel->getError()) return redirect()->to('dashboard/question/upload-excel');

        if (!$fileExcel->isValid() || $fileExcel->hasMoved()) {
            return false;
        }
        $newName = $fileExcel->getRandomName();
        $fileName = $newName;
        $fileExcel->move(UPLOAD_PATH, $newName);

        $reader = IOFactory::createReader("Xlsx");
		$spreadSheet = $reader->load(UPLOAD_PATH . '/' . $fileName);

        if (!$spreadSheet) return redirect()->to('dashboard/question/upload-excel');

		$sheetData = $spreadSheet->getActiveSheet()->rangeToArray('B2:J103');

		$part1 = array_slice($sheetData, 0, 3);
		$this->saveQuestionPart1($part1);

		$part2 = array_slice($sheetData, 3, 10);
		$this->saveQuestionPart2($part2);

		$part3 = array_chunk(array_slice($sheetData, 14, 21), 3);
		$this->saveQuestionPart3_n_4($part3);

		$part4 = array_chunk(array_slice($sheetData, 35, 15), 3);
		$this->saveQuestionPart3_n_4($part4);

		$part5 = array_slice($sheetData, 50, 14);
		$this->saveQuestionPart5($part5);
        
        return redirect()->to('dashboard/question');
    }
	
	private function saveQuestionPart1($dataSet)
	{
		$data = [
			'exam_part_id' =>  1,
			'title'        =>  'Question Part 1',
			'paragraph'    =>  $dataSet[0][2],
		];
		$questionGroupModel = new QuestionGroupModel();
		$questionGroupID = $questionGroupModel->insert($data, true);

		$questionAudioModel  = new QuestionAudioModel();
		$questionModel 	 	 = new QuestionModel();
		$questionImageModel  = new QuestionImageModel();
		$questionAnswerModel = new QuestionAnswerModel();

		foreach ($dataSet as $item) {
			$audioID = $questionAudioModel->insert(['audio_name' => $item[1]], true);
			$data = [
				'exam_part_id'      => 1,
				'type'		        => 1,
				'question_group_id' => $questionGroupID,
				'audio_id'          => $audioID != 0 ? $audioID : null,
				'right_option'      => QUESTION[$item[8]],
				'question'          => $item[3],
				'explain'           => 'No explain',
			];

			$questionID = $questionModel->insert($data, true);

			$data = [
				'question_id' => $questionID,
				'image_name' => $item[0]
			];
			$questionImageModel->insert($data);
			unset($data);

			$data[] = [
				'question_id' => $questionID,
				'type' 		  => 1,
				'text' 		  => $item[4]
			];
			$data[] = [
				'question_id' => $questionID,
				'type' 		  => 1,
				'text' 		  => $item[5]
			];
			$data[] = [
				'question_id' => $questionID,
				'type' 		  => 1,
				'text' 		  => $item[6]
			];
			$data[] = [
				'question_id' => $questionID,
				'type' 		  => 1,
				'text' 		  => $item[7]
			];

			$questionAnswerModel->insertBatch($data);
		}
	}

	private function saveQuestionPart2($dataSet)
	{
		$data = [
			'exam_part_id' =>  2,
			'title'        =>  'Question Part 2',
			'paragraph'    =>  $dataSet[0][2],
		];
		$questionGroupModel = new QuestionGroupModel();
		$questionGroupID = $questionGroupModel->insert($data, true);

		$questionAudioModel  = new QuestionAudioModel();
		$questionModel 	 	 = new QuestionModel();
		$questionAnswerModel = new QuestionAnswerModel();
		
		foreach ($dataSet as $item) {
			$audioID = $questionAudioModel->insert(['audio_name' => $item[1]], true);
			$data = [
				'exam_part_id'      => 2,
				'type'				=> 1,
				'question_group_id' => $questionGroupID,
				'audio_id'          => $audioID != 0 ? $audioID : null,
				'right_option'      => QUESTION[$item[8]],
				'question'          => $item[3],
				'explain'           => 'No explain',
			];

			$questionID = $questionModel->insert($data, true);
			unset($data);

			$data[] = [
				'question_id' => $questionID,
				'type' 		  => 1,
				'text' 		  => $item[4]
			];
			$data[] = [
				'question_id' => $questionID,
				'type' 		  => 1,
				'text' 		  => $item[5]
			];
			$data[] = [
				'question_id' => $questionID,
				'type' 		  => 1,
				'text' 		  => $item[6]
			];

			$questionAnswerModel->insertBatch($data);
		}
	}

	private function saveQuestionPart3_n_4($dataSet)
	{
		$questionAudioModel  = new QuestionAudioModel();
		$questionModel 	 	 = new QuestionModel();
		$questionAnswerModel = new QuestionAnswerModel();
		$questionGroupModel  = new QuestionGroupModel();
		$i = 0;
		foreach ($dataSet as $key => $item) {
			$data = [
				'exam_part_id' =>  3,
				'title'        =>  'Question Part 3 - Num ' . $key,
				'paragraph'    =>  $item[$i][2] ?? '',
			];
			$questionGroupID = $questionGroupModel->insert($data, true);
			$audioID = $questionAudioModel->insert(['audio_name' => $item[$i][1]], true);

			foreach ($item as $subItem) {
				$data = [
					'exam_part_id'      => 3,
					'type'				=> 1,
					'question_group_id' => $questionGroupID,
					'audio_id'          => $audioID != 0 ? $audioID : null,
					'right_option'      => QUESTION[$subItem[8]],
					'question'          => $subItem[3],
					'explain'           => 'No explain',
				];

				$questionID = $questionModel->insert($data, true);
				unset($data);

				$data[] = [
					'question_id' => $questionID,
					'type' 		  => 1,
					'text' 		  => $subItem[4]
				];
				$data[] = [
					'question_id' => $questionID,
					'type' 		  => 1,
					'text' 		  => $subItem[5]
				];
				$data[] = [
					'question_id' => $questionID,
					'type' 		  => 1,
					'text' 		  => $subItem[6]
				];
				$data[] = [
					'question_id' => $questionID,
					'type' 		  => 1,
					'text' 		  => $subItem[7]
				];

				$questionAnswerModel->insertBatch($data);
			}
			$i += 1;
			if (3 == $i) {
				$i = 0;
			}
		}
	}

	private function saveQuestionPart5($dataSet)
	{
		$questionModel 	 	 = new QuestionModel();
		$questionAnswerModel = new QuestionAnswerModel();
		foreach ($dataSet as $item) {
				$data = [
					'exam_part_id'      => 5,
					'type'				=> 2,
					'right_option'      => QUESTION[$item[8]],
					'question'          => $item[3],
					'explain'           => 'No explain',
				];

				$questionID = $questionModel->insert($data, true);
				unset($data);

				$data[] = [
					'question_id' => $questionID,
					'type' 		  => 1,
					'text' 		  => $item[4]
				];
				$data[] = [
					'question_id' => $questionID,
					'type' 		  => 1,
					'text' 		  => $item[5]
				];
				$data[] = [
					'question_id' => $questionID,
					'type' 		  => 1,
					'text' 		  => $item[6]
				];
				$data[] = [
					'question_id' => $questionID,
					'type' 		  => 1,
					'text' 		  => $item[7]
				];

				$questionAnswerModel->insertBatch($data);
		}
	}
}
