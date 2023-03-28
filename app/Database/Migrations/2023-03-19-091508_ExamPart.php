<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExamPart extends Migration
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
            'part_number' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'direction' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('exam_part', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('exam_part', TRUE);
    }
}
