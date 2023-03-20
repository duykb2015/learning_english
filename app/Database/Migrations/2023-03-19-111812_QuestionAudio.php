<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class QuestionAudio extends Migration
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
            'audio_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => '1'
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('question_id', 'question', 'id', '', '', 'fk_q_a_question_id_question_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('question_audio', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('question_audio', 'fk_q_a_question_id_question_id');
        $this->forge->dropTable('question_audio', TRUE);
    }
}
