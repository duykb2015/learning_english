<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],
            'created_at DATETIME NOT NULL DEFAULT current_timestamp',
            'updated_at DATETIME NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('author', 'admin', 'id', '', '', 'fk_posts_author_admin_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('posts', TRUE, $attributes);
    }

    public function down()
    {
        $this->forge->dropForeignKey('posts', 'fk_posts_author_admin_id');
        $this->forge->dropTable('posts', TRUE);
    }
}
