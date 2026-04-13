<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\MovieModel;

class Movie extends BaseController
{
    public function show($id)
    {
        $movieModel = new MovieModel();
        $movie = $movieModel->find($id);
        echo view('dashboard/movie/show', ['movie' => $movie]);
    }

    public function new()
    {
        echo view('dashboard/movie/new', [
            'movie' => [
                'title' => '',
                'description' => '',
            ]
        ]);
    }

    public function create()
    {
        $movieModel = new MovieModel();
        if ($this->validate('movies')) {
            $movieModel->insert([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
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
        echo view('dashboard/movie/edit', ['movie' => $movieModel->find($id)]);
    }

    public function update($id)
    {
        $movieModel = new MovieModel();
        if ($this->validate('movies')) {
            $movieModel->update($id, [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description')
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

        echo view('dashboard/movie/index', [
            'movies' => $movieModel->findAll(),
        ]);
    }
}