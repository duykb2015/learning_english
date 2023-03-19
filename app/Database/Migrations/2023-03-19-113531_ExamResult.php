<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExamResult extends Migration
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
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'exam_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'number_of_correct_answers' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'score' => [
                'type' => 'MEDIUMINT',
                'constraint' => 3,
                'null' => FALSE,
            ],
            'created_at DATETIME NOT NULL DEFAULT current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'user', 'id', '', '', 'fk_e_r_user_id_user_id');
        $this->forge->addForeignKey('exam_id', 'exam', 'id', '', '', 'fk_e_r_exam_id_exam_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('exam_result', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('exam_result', 'fk_e_r_user_id_user_id');
        $this->forge->dropForeignKey('exam_result', 'fk_e_r_exam_id_exam_id');
        $this->forge->dropTable('exam_result', TRUE);
    }
}
