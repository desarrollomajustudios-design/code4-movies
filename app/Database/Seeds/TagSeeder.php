<?php

namespace App\Database\Seeds;

use App\Models\CategoryModel;
use App\Models\TagModel;
use CodeIgniter\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tagModel = new TagModel();
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->limit(7)->findAll();
        $tagModel->where('id >=', 1)->delete();
        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                $tagModel->insert([
                    'title' => "Tag $i for category {$category->title}",
                    'category_id' => $category->id
                ]);
            }
        }


    }
}
