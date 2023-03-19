<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExamQuestion extends Migration
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
            'created_at DATETIME NOT NULL DEFAULT current_timestamp',
            'updated_at DATETIME NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('question_id', 'question', 'id', '', '', 'fk_e_q_question_id_question_id');
        $this->forge->addForeignKey('exam_id', 'exam', 'id', '', '', 'fk_e_q_exam_id_question_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('exam_question', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('exam_question', 'fk_e_q_question_id_question_id');
        $this->forge->dropForeignKey('exam_question', 'fk_e_q_exam_id_question_id');
        $this->forge->dropTable('exam_question', TRUE);
    }
}
