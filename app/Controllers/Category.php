<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{
    public function show($id)
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);
        echo view('category/show', ['category' => $category]);
    }

    public function new()
    {
        echo view('category/new', [
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

        echo 'Category Created';
    }

    public function edit($id)
    {
        $categoryModel = new CategoryModel();
        echo view('category/edit', ['category' => $categoryModel->find($id)]);
    }

    public function update($id)
    {
        $categoryModel = new CategoryModel();
        $categoryModel->update($id, [
            'title' => $this->request->getPost('title'),
        ]);
        echo 'Category updated';
    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();
        $categoryModel->delete($id);
        echo 'Category deleted';
    }

    public function index()
    {
        $categoryModel = new CategoryModel();

        echo view('category/index', [
            'categories' => $categoryModel->findAll(),
        ]);
    }
}