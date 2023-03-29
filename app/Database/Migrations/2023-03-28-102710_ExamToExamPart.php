<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExamToExamPart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
                'auto_increment' => TRUE,
            ],
            'exam_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'exam_part_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('exam_id', 'exam', 'id', '', '', 'fk_e_t_e_p_id_exam_id');
        $this->forge->addForeignKey('exam_part_id', 'exam_part', 'id', '', '', 'fk_e_t_e_p_id_exam_part_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('exam_to_exam_part', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('exam_to_exam_part', 'fk_e_t_e_p_id_exam_id');
        $this->forge->dropForeignKey('exam_to_exam_part', 'fk_e_t_e_p_id_exam_part_id');
        $this->forge->dropTable('exam_to_exam_part', TRUE);
    }
}
