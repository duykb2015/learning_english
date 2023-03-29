<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ExamPart extends Seeder
{
    public function run()
    {
        $datas[] = [
            'part_number' => 1,
            'title' => "Part 1",
            'direction' => "For each question in this part, you will hear four statements about a picture in your test book. When you hear the statements, you must select the one statement that best describes what you see in the picture. Then find the number of the question on your answer sheet and mark your answer. The statements will not be printed in your test book and will be spoken only one time.",
        ];
        $datas[] = [
            'part_number' => 2,
            'title' => "Part 2",
            'direction' => "You will hear a question or statement and three responses spoken in English. They will not be printed in your test book and will be spoken only one time. Select the best response to the question or statement and mark the letter (A), (B), or (C) on your answer sheet.",
        ];
        $datas[] = [
            'part_number' => 3,
            'title' => "Part 3",
            'direction' => "You will hear some conversations between two or more people. You will be asked to answer three questions about what the speakers say in each conversation. Select the best response to each question and mark the letter (A), (B), (C), or (D) on your answer sheet. The conversations will not be printed in your test book and will be spoken only one time.",
        ];
        $datas[] = [
            'part_number' => 4,
            'title' => "Part 4",
            'direction' => "You will hear some talks given by a single speaker. You will be asked to answer three questions about what the speaker says in each talk. Select the best response to each question and mark the letter (A), (B), (C), or (D) on your answer sheet. The talks will not be printed in your test book and will be spoken only one time.",
        ];
        $datas[] = [
            'part_number' => 5,
            'title' => "Part 5",
            'direction' => "In the Reading test, you will read a variety of texts and answer several different types of reading comprehension questions. The entire Reading test will last 75 minutes. There are three parts, and directions are given for each part. You are encouraged to answer as many questions as possible within the time allowed.
            You must mark your answers on the separate answer sheet. Do not write your answers in your test book.",
        ];
        $datas[] = [
            'part_number' => 6,
            'title' => "Part 6",
            'direction' => "Read the texts that follow. A word, phrase, or sentence is missing in parts of each text. Four answer choices for each question are given below the text. Select the best answer to complete the text. Then mark the letter (A), (B), (C), or (D) on your answer sheet.",
        ];
        $datas[] = [
            'part_number' => 7,
            'title' => "Part 7",
            'direction' => "In this part you will read a selection of texts, such as magazine and newspaper articles, e-mails, and instant messages. Each text or set of texts is followed by several questions. Select the best answer for each question and mark the letter (A), (B), (C), or (D) on your answer sheet.",
        ];

        $this->db->transBegin();
        $isSave = $this->db->table('exam_part')->insertBatch($datas);
        if (!$isSave) {
            $this->db->transRollback();
            throw new \Exception($this->db->error()['message']);
        }
        $this->db->transCommit();
    }
}
