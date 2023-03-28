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
            'audio_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('question_audio', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('question_audio', TRUE);
    }
}
