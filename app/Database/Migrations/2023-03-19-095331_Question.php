<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Question extends Migration
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
            'type' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
            ],
            'exam_part_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'question_group_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ],
            'audio_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ],
            'right_option' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
            ],
            'question' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'explain' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => '1'
            ],
            'created_at DATETIME NOT NULL DEFAULT current_timestamp',
            'updated_at DATETIME NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('exam_part_id', 'exam_part', 'id', '', '', 'fk_question_1');
        $this->forge->addForeignKey('question_group_id', 'question_group', 'id', '', '', 'fk_question_2');
        $this->forge->addForeignKey('audio_id', 'question_audio', 'id', '', '', 'fk_question_3');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('question', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('question', 'fk_question_1');
        $this->forge->dropForeignKey('question', 'fk_question_2');
        $this->forge->dropForeignKey('question', 'fk_question_3');
        $this->forge->dropTable('question', TRUE);
    }
}
