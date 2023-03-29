<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WrongAnswerQuestion extends Migration
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
            'question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'selected_answer' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => FALSE,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'user', 'id', '', '', 'fk_w_a_q_user_id_user_id');
        $this->forge->addForeignKey('question_id', 'question', 'id', '', '', 'fk_w_a_q_question_id_question_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('wrong_answer_question', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('wrong_answer_question', 'fk_w_a_q_user_id_user_id');
        $this->forge->dropForeignKey('wrong_answer_question', 'fk_w_a_q_question_id_question_id');
        $this->forge->dropTable('wrong_answer_question', TRUE);
    }
}
