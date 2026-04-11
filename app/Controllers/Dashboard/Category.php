<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Category extends BaseController
{
    public function show($id)
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);
        echo view('dashboard/category/show', ['category' => $category]);
    }

    public function new()
    {
        echo view('dashboard/category/new', [
            'category' => [
                'title' => ''
            ]
        ]);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $categoryModel->insert([
            'title' => $this->request->getPost('title')
        ]);

        return redirect()->to('/dashboard/category');
    }

    public function edit($id)
    {
        $categoryModel = new CategoryModel();
        echo view('dashboard/category/edit', ['category' => $categoryModel->find($id)]);
    }

    public function update($id)
    {
        $categoryModel = new CategoryModel();
        $categoryModel->update($id, [
            'title' => $this->request->getPost('title'),
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();
        $categoryModel->delete($id);
        return redirect()->back();
    }

    public function index()
    {
        $categoryModel = new CategoryModel();

        echo view('dashboard/category/index', [
            'categories' => $categoryModel->findAll(),
        ]);
    }
}