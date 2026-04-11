<?php

namespace App\Controllers;

use App\Models\MovieModel;

class Movie extends BaseController
{
    public function show($id)
    {
        $movieModel = new MovieModel();
        $movie = $movieModel->find($id);
        echo view('movie/show', ['movie' => $movie]);
    }

    public function new()
    {
        echo view('movie/new', [
            'movie' => [
                'title' => '',
                'description' => '',
            ]
        ]);
    }

    public function create()
    {
        $movieModel = new MovieModel();
        $movieModel->insert([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ]);

        echo 'Movie added';
    }

    public function edit($id)
    {
        $movieModel = new MovieModel();
        echo view('movie/edit', ['movie' => $movieModel->find($id)]);
    }

    public function update($id)
    {
        $movieModel = new MovieModel();
        $movieModel->update($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description')
        ]);
        echo 'Movie updated';
    }

    public function delete($id)
    {
        $movieModel = new MovieModel();
        $movieModel->delete($id);
        echo 'Movie deleted';
    }

    public function index()
    {
        $movieModel = new MovieModel();

        echo view('movie/index', [
            'movies' => $movieModel->findAll(),
        ]);
    }
}