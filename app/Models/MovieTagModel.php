<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieTagModel extends Model
{
    protected $table = 'movie_tag';
    protected $returnType = 'object';
    protected $allowedFields = ['movie_id', 'tag_id'];
}
