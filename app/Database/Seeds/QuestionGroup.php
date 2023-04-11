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

	}

	private function saveQuestionPart1($dataSet)
	{
		$data = [
			'exam_part_id' =>  1,
			'title'        =>  'None',
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
			'exam_part_id' =>  1,
			'title'        =>  'None',
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
				'exam_part_id'      => 1,
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
}
