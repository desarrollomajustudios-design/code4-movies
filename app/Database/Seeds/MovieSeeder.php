<?php

namespace App\Database\Seeds;

use App\Models\MovieModel;
use CodeIgniter\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $movieModel = new MovieModel();

        $movieModel->where('id >=', 1)->delete();

        $movieModel->insertBatch([
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
            ],
            [
                'title' => 'The Irishman',
                'description' => 'A mob hitman recalls his possible involvement with the slaying of Jimmy Hoffa.',
            ],
            [
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
            ],
        ]);
    }
}
