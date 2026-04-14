<?php

namespace App\Database\Seeds;

use App\Models\CategoryModel;
use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categoryModel = new CategoryModel();

//        Esta es una forma de realizar la semilla llamando directo de esta forma  $this->db->table('TABLE_NAME')

//        $this->db->table('categories')->where('id >=', 1)->delete();
//
//        for ($i = 0; $i < 20; $i++) {
//            $this->db->table('categories')->insert([
//                'title' => "Category $i"
//            ]);
//        }

//        Esta es la segunda forma que es usando una instacnia del modelo y el codigo queda mas limpio pero se puede de ambas formas

        $categoryModel->where('id >=', 1)->delete();

        for ($i = 0; $i < 20; $i++) {
            $categoryModel->insert([
                'title' => "Category $i"
            ]);
        }
    }
}
