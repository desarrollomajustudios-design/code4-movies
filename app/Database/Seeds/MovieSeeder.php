<?php

namespace App\Database\Seeds;

use App\Models\CategoryModel;
use App\Models\MovieModel;
use CodeIgniter\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $movieModel = new MovieModel();
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->limit(3)->findAll();

        $movieModel->where('id >=', 1)->delete();

        $movies = [
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over years, finding redemption.',
                'category_id' => $categories[0]->id,
            ],
            [
                'title' => 'The Irishman',
                'description' => 'A mob hitman reflects on his life of crime.',
                'category_id' => $categories[1]->id,
            ],
            [
                'title' => 'The Godfather',
                'description' => 'The story of a powerful crime family.',
                'category_id' => $categories[1]->id,
            ],
            [
                'title' => 'The Godfather Part II',
                'description' => 'The continuation of the Corleone family saga.',
                'category_id' => $categories[1]->id,
            ],
            [
                'title' => 'Pulp Fiction',
                'description' => 'Interwoven stories of crime in Los Angeles.',
                'category_id' => $categories[1]->id,
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who steals secrets through dream-sharing technology.',
                'category_id' => $categories[0]->id,
            ],
            [
                'title' => 'Interstellar',
                'description' => 'A team travels through a wormhole in space.',
                'category_id' => $categories[0]->id,
            ],
            [
                'title' => 'The Dark Knight',
                'description' => 'Batman faces the Joker in Gotham City.',
                'category_id' => $categories[0]->id,
            ],
            [
                'title' => 'Fight Club',
                'description' => 'An underground fight club becomes something bigger.',
                'category_id' => $categories[2]->id,
            ],
            [
                'title' => 'Forrest Gump',
                'description' => 'The life journey of a simple man with a big heart.',
                'category_id' => $categories[2]->id,
            ],
            [
                'title' => 'Gladiator',
                'description' => 'A betrayed Roman general seeks revenge.',
                'category_id' => $categories[2]->id,
            ],
            [
                'title' => 'Titanic',
                'description' => 'A love story on the ill-fated ship Titanic.',
                'category_id' => $categories[2]->id,
            ],
            [
                'title' => 'Avatar',
                'description' => 'A marine on an alien planet becomes part of its world.',
                'category_id' => $categories[0]->id,
            ],
            [
                'title' => 'Avengers: Endgame',
                'description' => 'Heroes assemble to undo Thanos’ actions.',
                'category_id' => $categories[0]->id,
            ],
            [
                'title' => 'Joker',
                'description' => 'The origin story of the Joker in Gotham.',
                'category_id' => $categories[1]->id,
            ],
        ];

        $movieModel->insertBatch($movies);
    }
}