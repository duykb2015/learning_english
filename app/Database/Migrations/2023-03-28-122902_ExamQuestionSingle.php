<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExamQuestionSingle extends Migration
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
            'question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'exam_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('question_id', 'question', 'id', '', '', 'fk_w_a_q_s_id_question_id');
        $this->forge->addForeignKey('exam_id', 'exam', 'id', '', '', 'fk_w_a_q_s_id_exam_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('exam_question_single', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('exam_question_single', 'fk_w_a_q_s_id_question_id');
        $this->forge->dropForeignKey('exam_question_single', 'fk_w_a_q_s_id_exam_id');
        $this->forge->dropTable('exam_question_single', TRUE);
    }
}
