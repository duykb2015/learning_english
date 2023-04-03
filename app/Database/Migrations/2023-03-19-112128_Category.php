<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
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
            // 'parent_id' => [
            //     'type' => 'INT',
            //     'constraint' => 11,
            //     'null' => FALSE,
            // ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default'=> 1
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        // $this->forge->addForeignKey('parent_id', 'category', 'id', '', '', 'fk_category_id');
        $attributes = [
            'ENGINE' => 'InnoDB',
            'CHARACTER SET' => 'utf8',
            'COLLATE' => 'utf8_general_ci'
        ];
        $this->forge->createTable('category', TRUE, $attributes);
    }

    public function down()
    {
        //$this->forge->dropForeignKey('category', 'fk_category_id');
        $this->forge->dropTable('category', TRUE);
    }
}
