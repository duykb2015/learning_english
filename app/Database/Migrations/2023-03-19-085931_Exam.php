<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Exam extends Migration
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
            'level' => [
                'type' => 'SMALLINT',
                'constraint' => 3,
                'null' => FALSE,
            ],
            'title' => [
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
            'created_at DATETIME NOT NULL DEFAULT current_timestamp',
            'updated_at DATETIME NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('author', 'admin', 'id', '', '', 'fk_exam_author_admin_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('exam', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('exam', 'fk_exam_author_admin_id');
        $this->forge->dropTable('exam', TRUE);
    }
}
