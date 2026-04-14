<?php

namespace App\Database;

use CodeIgniter\Database\Migration;

class AddCategoryRelationToMovie extends Migration
{
    public function up()
    {
        $this->forge->addColumn('movies', [
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
        ]);

        $this->db->query("ALTER TABLE movies ENGINE=InnoDB");

        $this->db->query("
            ALTER TABLE movies
            ADD CONSTRAINT movies_category_id_foreign
            FOREIGN KEY (category_id)
            REFERENCES categories(id)
            ON DELETE SET NULL
            ON UPDATE CASCADE
        ");
    }

    public function down()
    {
        $this->db->query("
            ALTER TABLE movies
            DROP FOREIGN KEY movies_category_id_foreign
        ");

        $this->forge->dropColumn('movies', 'category_id');
    }
}