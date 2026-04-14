<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MovieImage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'movie_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'image_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ]
        ]);
        $this->forge->addForeignKey('movie_id', 'movie', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('image_id', 'image', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('movie_image');
    }

    public function down()
    {
        $this->forge->dropTable('movie_image');
    }
}
