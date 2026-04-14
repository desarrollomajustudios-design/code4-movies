<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'category_id'];
    protected $returnType = 'object';

    public function getImagesByMovieId($movieId)
    {
        return $this->select("i.*")
            ->join("movie_image mi", "mi.movie_id = movies.id")
            ->join("images i", "i.id = mi.image_id")
            ->where("movies.id", $movieId)
            ->findAll();
    }

    public function getTagsByMovieId($movieId)
    {
        return $this->select('t.*')
            ->join('movie_tag mt', 'mt.movie_id = movies.id')
            ->join('tags t', 't.id = mt.tag_id')
            ->where('movies.id', $movieId)
            ->findAll();
    }
}
