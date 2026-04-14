<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieImageModel extends Model
{
    protected $table = 'movie_image';
    protected $allowedFields = ['movie_id', 'image_id'];

}
