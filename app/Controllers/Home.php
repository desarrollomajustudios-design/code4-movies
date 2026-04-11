<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        echo "hola muendoi";
        return view('welcome_message');
    }

    public function update($id)
    {
        echo $id;
    }
}