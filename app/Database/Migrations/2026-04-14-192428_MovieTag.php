<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MovieTag extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'movie_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'tag_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ]
        ]);
        $this->forge->addForeignKey('movie_id', 'movie', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('movie_tag');
    }

    public function down()
    {
        $this->forge->dropTable('movie_tag');
    }
}
