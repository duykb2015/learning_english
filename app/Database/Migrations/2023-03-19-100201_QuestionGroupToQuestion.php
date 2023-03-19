<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class QuestionGroupToQuestion extends Migration
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
            'question_group_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('question_group_id', 'question_group', 'id', '', '', 'fk_q_g_to_q_q_g_id_q_g_id');
        $this->forge->addForeignKey('question_id', 'question', 'id', '', '', 'fk_q_g_to_q_q_id_q_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('question_group_to_question', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('question_group_to_question', 'fk_q_g_to_q_q_g_id_q_g_id');
        $this->forge->dropForeignKey('question_group_to_question', 'fk_q_g_to_q_q_id_q_id');
        $this->forge->dropTable('question_group_to_question', TRUE);
    }
}
