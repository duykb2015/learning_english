<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ExamPart extends Seeder
{
    public function run()
    {
        $data[] = [
            'part_number' => 1,
            'title' => "Part 1",
            'slug' => "part-1",
            'direction' => "",
        ];

        $this->db->transBegin();
        $is_save = $this->db->table('exam_part')->insert($data);
        if (!$is_save) {
            $this->db->transRollback();
            throw new \Exception($this->db->error()['message']);
        }
        $this->db->transCommit();
    }
}
