<?php

namespace App\Controllers\API;


use CodeIgniter\RESTful\ResourceController;

class Category extends ResourceController
{
    protected $modelName = 'App\Models\CategoryModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        return $this->respond($this->model->find($id));
    }

    public function create()
    {
        if ($this->validate('categories')) {
            $this->model->insert([
                'title' => $this->request->getPost('title'),
            ]);
        } else {
            return $this->failValidationErrors($this->validator->getErrors(), 400);
        }
        return $this->respondCreated();
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        if (!$this->validate('categories')) {
            return $this->failValidationErrors($this->validator->getErrors(), 400);
        }
        $this->model->update($id, [
            'title' => $data['title'],
        ]);
        return $this->respondUpdated();
    }

    public function delete($id = null){
        $this->model->delete($id);
        return $this->respondDeleted();
    }
}
