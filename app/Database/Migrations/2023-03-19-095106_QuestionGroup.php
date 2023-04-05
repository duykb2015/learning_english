<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class QuestionGroup extends Migration
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
            'exam_part_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'paragraph' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('exam_part_id', 'exam_part', 'id', '', '', 'fk_q_g_e_part_id_exam_part_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('question_group', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('question_group', 'fk_q_g_e_part_id_exam_part_id');
        $this->forge->dropTable('question_group', TRUE);
    }
}
