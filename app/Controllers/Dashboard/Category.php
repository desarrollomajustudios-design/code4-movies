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
            'category' => new CategoryModel()
        ]);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        if ($this->validate('categories')) {
            $categoryModel->insert([
                'title' => $this->request->getPost('title')
            ]);
        } else {
            session()->setFlashdata(['validation' => $this->validator]);
            return redirect()->back()->withInput();
        }

        return redirect()->to('/dashboard/category')->with('message', 'Category created!');
    }

    public function edit($id)
    {
        $categoryModel = new CategoryModel();
        echo view('dashboard/category/edit', ['category' => $categoryModel->find($id)]);
    }

    public function update($id)
    {
        $categoryModel = new CategoryModel();
        if ($this->validate('categories')) {
            $categoryModel->update($id, [
                'title' => $this->request->getPost('title'),
            ]);
        } else {
            session()->setFlashdata(['validation' => $this->validator]);
            return redirect()->back()->withInput();
        }
        return redirect()->back()->with('message', 'Category updated!');
    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();
        $categoryModel->delete($id);
        session()->setFlashdata('message', 'Category deleted!');
        return redirect()->back();
//        return redirect()->back()->with('message', 'Category deleted!');
    }

    public function index()
    {
        $categoryModel = new CategoryModel();

        echo view('dashboard/category/index', [
            'categories' => $categoryModel->paginate(10),
            'pager' => $categoryModel->pager
        ]);
    }
}