<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\TagModel;

class Tag extends BaseController
{
    public function index()
    {
        $tagModel = new TagModel();
        $data['tags'] = $tagModel->select('tags.*, categories.title as category')
            ->join('categories', 'categories.id = tags.category_id', 'left')
            ->paginate(10);
        $data['pager'] = $tagModel->pager;

        echo view('dashboard/tag/index', $data);
    }

    public function new()
    {
        $categoryModel = new CategoryModel();
        echo view('dashboard/tag/new', [
            'tag' => new TagModel(),
            'categories' => $categoryModel->findAll()
        ]);
    }

    public function create()
    {
        $tagModel = new TagModel();
        if ($this->validate('tags')) {
            $tagModel->insert([
                'title' => $this->request->getPost('title'),
                'category_id' => $this->request->getPost('category_id'),
            ]);
            return redirect()->to('/dashboard/tag')->with('message', 'Tags added!');
        } else {
            session()->setFlashdata(['validation' => $this->validator]);
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $tagModel = new TagModel();
        $categoryModel = new CategoryModel();
        echo view('dashboard/tag/edit', [
            'tag' => $tagModel->find($id),
            'categories' => $categoryModel->findAll()
        ]);
    }

    public function update($id)
    {
        $tagModel = new TagModel();
        if ($this->validate('tags')) {
            $tagModel->update($id, [
                'title' => $this->request->getPost('title'),
                'category_id' => $this->request->getPost('category_id'),
            ]);
            return redirect()->back()->with('message', 'Tags updated!');
        } else {
            session()->setFlashdata(['validation' => $this->validator]);
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $tagModel = new TagModel();
        $tagModel->delete($id);
        session()->setFlashData('message', 'Tags deleted!');
        return redirect()->back();
    }
}
