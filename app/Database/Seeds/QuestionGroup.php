<?php

namespace App\Database\Seeds;

use App\Models\QuestionAnswerModel;
use App\Models\QuestionAudioModel;
use App\Models\QuestionGroupModel;
use App\Models\QuestionImageModel;
use App\Models\QuestionModel;
use CodeIgniter\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class QuestionGroup extends Seeder
{
	public function run()
	{
		$reader = IOFactory::createReader("Xlsx");
		$spreadSheet = $reader->load(UPLOAD_PATH . '/exam1.xlsx');

		$sheetData = $spreadSheet->getActiveSheet()->rangeToArray('B2:J103');

		$part1 = array_slice($sheetData, 0, 3);
		$this->saveQuestionPart1($part1);

		$part2 = array_slice($sheetData, 3, 10);
		$this->saveQuestionPart2($part2);

		$part3 = array_chunk(array_slice($sheetData, 14, 21), 3);
		$this->saveQuestionPartN($part3, 3);

		$part4 = array_chunk(array_slice($sheetData, 35, 15), 3);
		$this->saveQuestionPartN($part4, 4);

		$part5 = array_slice($sheetData, 50, 14);
		$this->saveQuestionPart5($part5);

		$part6 = array_chunk(array_slice($sheetData, 64, 12), 3);
		$this->saveQuestionPartN($part6, 6, 2);

		$part7_1 = array_chunk(array_slice($sheetData, 73, 15), 5);
		$this->saveQuestionPartN($part7_1, 7, 2, 5);

		$part7_2 = array_chunk(array_slice($sheetData, 88, 12), 3);
		$this->saveQuestionPartN($part7_2, 7, 2);
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

	private function saveQuestionPartN($dataSet, $part, $type = 1, $question_per_paragraph = 3)
	{
		$questionAudioModel  = new QuestionAudioModel();
		$questionModel 	 	 = new QuestionModel();
		$questionAnswerModel = new QuestionAnswerModel();
		$questionGroupModel  = new QuestionGroupModel();
		$i = 0;
		foreach ($dataSet as $key => $item) {
			$data = [
				'exam_part_id' =>  $part,
				'title'        =>  'Question Part ' . $part . ' - Num ' . $key,
				'paragraph'    =>  $item[$i][2] ?? '',
			];
			$questionGroupID = $questionGroupModel->insert($data, true);
			$audioID = 0;
			if ($item[$i][1])
				$audioID = $questionAudioModel->insert(['audio_name' => $item[$i][1]], true);

			foreach ($item as $subItem) {
				$data = [
					'exam_part_id'      => $part,
					'type'				=> $type,
					'question_group_id' => $questionGroupID,
					'audio_id'          => $audioID != 0 ? $audioID : null,
					'right_option'      => QUESTION[$subItem[8] ?? 'A'],
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
			if ($question_per_paragraph == $i) {
				$i = 0;
			}
		}
	}


}
