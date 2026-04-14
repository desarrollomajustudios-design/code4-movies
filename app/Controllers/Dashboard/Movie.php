<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ImageModel;
use App\Models\MovieImageModel;
use App\Models\MovieModel;
use App\Models\MovieTagModel;
use App\Models\TagModel;

class Movie extends BaseController
{
    public function show($id)
    {
        $movieModel = new MovieModel();
        $movie = $movieModel->find($id);
        echo view('dashboard/movie/show', [
            'movie' => $movie,
            'images' => $movieModel->getImagesByMovieId($id),
            'tags' => $movieModel->getTagsByMovieId($id),
        ]);
    }

    public function new()
    {
        $categoriesModel = new CategoryModel();
        echo view('dashboard/movie/new', [
            'movie' => new MovieModel(),
            'categories' => $categoriesModel->find()
        ]);
    }

    public function create()
    {
        $movieModel = new MovieModel();
        if ($this->validate('movies')) {
            $movieModel->insert([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'category_id' => $this->request->getPost('category_id'),
            ]);
        } else {
            session()->setFlashdata(['validation' => $this->validator]);
            return redirect()->back()->withInput();
        }
        return redirect()->to('/dashboard/movie')->with('message', 'Movie added!');
    }

    public function edit($id)
    {
        $movieModel = new MovieModel();
        $categoryModel = new CategoryModel();
        echo view('dashboard/movie/edit', ['movie' => $movieModel->find($id), 'categories' => $categoryModel->find()]);
    }

    public function update($id)
    {
        $movieModel = new MovieModel();
        if ($this->validate('movies')) {
            $movieModel->update($id, [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'category_id' => $this->request->getPost('category_id'),
            ]);
        } else {
            session()->setFlashdata(['validation' => $this->validator]);
            return redirect()->back()->withInput();
        }

        return redirect()->back()->with('message', 'Movie updated!');
    }

    public function delete($id)
    {
        $movieModel = new MovieModel();
        $movieModel->delete($id);
        session()->setFlashData('message', 'Movie deleted!');
        return redirect()->back();
    }

    public function index()
    {
        $movieModel = new MovieModel();
        $this->asignImage();


        $data['movies'] = $movieModel->select('movies.*,categories.title as category')->join('categories', 'categories.id = movies.category_id')->findAll();

        echo view('dashboard/movie/index', $data);
    }

    public function tags($id)
    {
        $categoryModel = new CategoryModel();
        $tagModel = new TagModel();
        $movieModel = new MovieModel();

        $tags = [];

        if ($this->request->getGet('category_id')) {
            $tags = $tagModel
                ->where('category_id', $this->request->getGet('category_id'))
                ->findAll();
        }

        echo view('dashboard/movie/tags', [
            'movie' => $movieModel->find($id),
            'categories' => $categoryModel->findAll(),
            'category_id' => $this->request->getGet('category_id'),
            'tags' => $tags
//            'tags' => $tagModel->whereIn('category_id', $categoryModel->select('id')->where('id', $movieModel->select('category_id')->find($id))->findColumn())->findAll(),
        ]);
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
        return redirect()->back();
    }

    public function tag_delete($movieId, $tagId)
    {
        $movieTagModel = new MovieTagModel();
        $movieTagModel->where('movie_id', $movieId)->where('tag_id', $tagId)->delete();

        return $this->response->setJSON(['message' => 'Tag deleted!']);

    }


    private function generateImage()
    {
        $imageModel = new ImageModel();
        $imageModel->insert([
            'image' => date('Y-m-d H:m:s'),
            'extension' => 'Pending',
            'data' => 'Pending',
        ]);
    }

    private function asignImage()
    {
        $movieImageModel = new movieImageModel();
        $movieImageModel->insert([
            'image_id' => 2,
            'movie_id' => 4,
        ]);
    }
}