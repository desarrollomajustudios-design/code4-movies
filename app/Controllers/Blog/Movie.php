<?php

namespace App\Controllers\Blog;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\MovieModel;
use App\Models\TagModel;
use CodeIgniter\HTTP\ResponseInterface;

class Movie extends BaseController
{
    public function index()
    {
        $movieModel = new MovieModel();
        $categoryModel = new CategoryModel();
        $tagModel = new TagModel();

        $movies = $movieModel
            ->when($this->request->getGet('find'), function ($builder, $find) {
                $builder->groupStart()
                    ->orLike('movies.title', $find, 'both')
                    ->orLike('movies.description', $find, 'both')
                    ->groupEnd();
            })
            ->select('movies.*, categories.title as category, GROUP_CONCAT(DISTINCT(tags.title)) as tags, MAX(images.image) as image')
            ->join('categories', 'categories.id = movies.category_id')
            ->join('movie_image', 'movie_image.movie_id = movies.id', 'left')
            ->join('images', 'images.id = movie_image.image_id', 'left')
            ->join('movie_tag', 'movie_tag.movie_id = movies.id', 'left')
            ->join('tags', 'tags.id = movie_tag.tag_id', 'left');

//        if ($find = $this->request->getGet('find')) {
//            $movies = $movies->groupStart()
//                ->orLike('movies.title', $find, 'both');
//            $movies = $movies
//                ->orLike('movies.description', $find, 'both')->groupEnd();
//        }

        if ($categoryId = $this->request->getGet('category_id')) {
            $movies = $movies->where('movies.category_id', $categoryId);
        }
        if ($tagId = $this->request->getGet('tag_id')) {
            $movies = $movies->where('tags.id', $tagId);
        }

        $movies = $movies->groupBy('movies.id')->paginate();
        $categoryId = $this->request->getGet('category_id');

        $data['movies'] = $movies;
        $data['categories'] = $categoryModel->findAll();
        $data['tags'] = $categoryId == '' ? [] : $tagModel->where('category_id', $categoryId)->findAll();
        $data['pager'] = $movieModel->pager;
        $data['category_id'] = $categoryId;
        $data['tag_id'] = $this->request->getGet('tag_id');
        $data['find'] = $this->request->getGet('find');

        echo view('blog/movie/index', $data);
    }

    public function show($id)
    {
        $movieModel = new MovieModel();
        $data['movie'] = $movieModel
            ->select('movies.*, categories.title as category')
            ->join('categories', 'categories.id = movies.category_id')->find($id);
        $data['images'] = $movieModel->getImagesByMovieId($id);
        $data['tags'] = $movieModel->getTagsByMovieId($id);


        echo view('blog/movie/show', $data);
    }

    public function tagsByCategory($categoryId)
    {
        $tagModel = new TagModel();
        $tags = $tagModel->where('category_id', $categoryId)->findAll();
        return $this->response->setJSON($tags);
    }

    public function index_for_tags($tagId)
    {
        $movieModel = new MovieModel();
        $tagModel = new TagModel();
        $tag = $tagModel->find($tagId);

        $movies = $movieModel
            ->when($this->request->getGet('find'), function ($builder, $find) {
                $builder->groupStart()
                    ->orLike('movies.title', $find, 'both')
                    ->orLike('movies.description', $find, 'both')
                    ->groupEnd();
            })
            ->select('movies.*, categories.title as category, GROUP_CONCAT(DISTINCT(tags.title)) as tags, MAX(images.image) as image')
            ->join('categories', 'categories.id = movies.category_id')
            ->join('movie_image', 'movie_image.movie_id = movies.id', 'left')
            ->join('images', 'images.id = movie_image.image_id', 'left')
            ->join('movie_tag', 'movie_tag.movie_id = movies.id', 'left')
            ->join('tags', 'tags.id = movie_tag.tag_id', 'left')
            ->where('tags.id', $tagId);

        $movies = $movies->groupBy('movies.id')->paginate();

        $data['movies'] = $movies;
        $data['tags'] = $tag;
        $data['pager'] = $movieModel->pager;

        echo view('blog/movie/index_for_tag', $data);
    }

    public function index_for_categories($categoryId)
    {
        $movieModel = new MovieModel();
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($categoryId);

        $movies = $movieModel
            ->when($this->request->getGet('find'), function ($builder, $find) {
                $builder->groupStart()
                    ->orLike('movies.title', $find, 'both')
                    ->orLike('movies.description', $find, 'both')
                    ->groupEnd();
            })
            ->select('movies.*, categories.title as category, GROUP_CONCAT(DISTINCT(tags.title)) as tags, MAX(images.image) as image')
            ->join('categories', 'categories.id = movies.category_id')
            ->join('movie_image', 'movie_image.movie_id = movies.id', 'left')
            ->join('images', 'images.id = movie_image.image_id', 'left')
            ->join('movie_tag', 'movie_tag.movie_id = movies.id', 'left')
            ->join('tags', 'tags.id = movie_tag.tag_id', 'left')
            ->where('categories.id', $categoryId);

        $movies = $movies->groupBy('movies.id')->paginate();

        $data['movies'] = $movies;
        $data['category'] = $category;
        $data['pager'] = $movieModel->pager;

        echo view('blog/movie/index_for_category', $data);
    }
}
