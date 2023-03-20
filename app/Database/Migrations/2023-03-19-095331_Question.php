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
            'author' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'type' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
            ],
            'exam_part_id' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
            ],
            'right_answer' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
            ],
            'quesstion' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],
            'answer1' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'answer2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'answer3' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'answer4' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
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
        $this->forge->addForeignKey('author', 'admin', 'id', '', '', 'fk_question_author_admin_id');
        $this->forge->addForeignKey('exam_part_id', 'exam_part', 'id', '', '', 'fk_q_e_p_id_exam_part_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('question', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('question', 'fk_question_author_admin_id');
        $this->forge->dropForeignKey('question', 'fk_q_e_p_id_exam_part_id');
        $this->forge->dropTable('question', TRUE);
    }
}
