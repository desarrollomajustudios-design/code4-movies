<?php

namespace App\Controllers\API;

use App\Models\MovieTagModel;
use CodeIgniter\RESTful\ResourceController;

class Movie extends ResourceController
{
    protected $modelName = 'App\Models\MovieModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function list()
    {
        return $this->respond($this->model->paginate(10));
    }

    public function listFull()
    {
        $movies = $this->model
            ->when($this->request->getGet('find'), function ($builder, $find) {
                $builder->groupStart()
                    ->orLike('movies.title', $find, 'both')
                    ->orLike('movies.description', $find, 'both')
                    ->groupEnd();
            })
            ->when($this->request->getGet('tag_id'), function ($builder, $tag_id) {
                $builder->where('tags.id', $tag_id);
            })
            ->when($this->request->getGet('category_id'), function ($builder, $category_id) {
                $builder->where('movies.category_id', $category_id);
            })
            ->select('movies.*, categories.title as category, GROUP_CONCAT(DISTINCT(tags.title)) as tags, MAX(images.image) as image')
            ->join('categories', 'categories.id = movies.category_id')
            ->join('movie_image', 'movie_image.movie_id = movies.id', 'left')
            ->join('images', 'images.id = movie_image.image_id', 'left')
            ->join('movie_tag', 'movie_tag.movie_id = movies.id', 'left')
            ->join('tags', 'tags.id = movie_tag.tag_id', 'left');

        $movies = $movies->groupBy('movies.id')->paginate();
        return $this->respond($movies);
    }

    public function index_for_category($categoryId)
    {
        $movies = $this->model
            ->select('movies.*, categories.title as category, GROUP_CONCAT(DISTINCT(tags.title)) as tags, MAX(images.image) as image')
            ->join('categories', 'categories.id = movies.category_id')
            ->join('movie_image', 'movie_image.movie_id = movies.id', 'left')
            ->join('images', 'images.id = movie_image.image_id', 'left')
            ->join('movie_tag', 'movie_tag.movie_id = movies.id', 'left')
            ->join('tags', 'tags.id = movie_tag.tag_id', 'left')
            ->where('categories.id', $categoryId);

        $movies = $movies->groupBy('movies.id')->paginate();
        return $this->respond($movies);
    }

    public function index_for_tag($tagId)
    {
        $movies = $this->model
            ->select('movies.*, categories.title as category, GROUP_CONCAT(DISTINCT(tags.title)) as tags, MAX(images.image) as image')
            ->join('categories', 'categories.id = movies.category_id')
            ->join('movie_image', 'movie_image.movie_id = movies.id', 'left')
            ->join('images', 'images.id = movie_image.image_id', 'left')
            ->join('movie_tag', 'movie_tag.movie_id = movies.id', 'left')
            ->join('tags', 'tags.id = movie_tag.tag_id', 'left')
            ->where('tags.id', $tagId);

        $movies = $movies->groupBy('movies.id')->paginate();
        return $this->respond($movies);
    }


    public function show($id = null)
    {
        $data = [
            $data['movie'] = $this->model
                ->select('movies.*, categories.title as category')
                ->join('categories', 'categories.id = movies.category_id')
                ->find($id),
            $data['images'] = $this->model->getImagesByMovieId($id),
            $data['tags'] = $this->model->getTagsByMovieId($id)

        ];

        return $this->respond($data);
    }

    public function create()
    {
        if ($this->validate('movies')) {
            $this->model->insert([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
            ]);
        } else {
            return $this->failValidationErrors($this->validator->getErrors(), 400);
        }
        return $this->respondCreated();
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->validate('movies')) {
            return $this->failValidationErrors($this->validator->getErrors(), 400);
        }

        $this->model->update($id, [
            'title' => $data['title'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
        ]);

        return $this->respondUpdated();
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted();
    }

    public function tags_post($id)
    {
        $movieTagModel = new MovieTagModel();
        $tagId = $this->request->getPost('tag_id');
        $movieId = $id;

        $movieTag = $movieTagModel->where('movie_id', $movieId)->where('tag_id', $tagId)->first();

        if (!$movieTag) {
            $movieTagModel->insert([
                'movie_id' => $movieId,
                'tag_id' => $tagId,
            ]);
        }
        return $this->respond('OK');
    }

    public function tag_delete($movieId, $tagId)
    {
        $movieTagModel = new MovieTagModel();
        $movieTagModel->where('movie_id', $movieId)->where('tag_id', $tagId)->delete();

        return $this->response->setJSON(['message' => 'Tag deleted!']);
    }

}