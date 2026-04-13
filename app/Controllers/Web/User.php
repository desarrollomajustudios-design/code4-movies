<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function create_user()
    {
        $userModel = new UserModel();
        $userModel->insert([
            'user' => 'admin',
            'email' => 'admin@test.com',
            'password' => $userModel->password_hash('admin123'),
        ]);
    }

    public function login()
    {
        echo view('web/user/login');
    }

    public function login_user()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->select('id, user, email, password, type')
            ->orWhere('email', $email)
            ->orWhere('user', $email)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User or password is incorrect');
        }

        if ($userModel->verifyPassword($password, $user->password)) {
            $session = session();
            unset($user->password);
            $session->set('user', $user);

            return redirect()->to('/dashboard/movie')->with('message', "You are logged in successfully!, Welcome $user->user");
        }
        return redirect()->back()->with('error', 'User or password is incorrect');
    }

    public function register()
    {
        echo view('web/user/signup');
    }

    public function register_user()
    {
        $userModel = new UserModel();

        if ($this->validate('users')) {
            $userModel->insert([
                'user' => $this->request->getPost('user'),
                'email' => $this->request->getPost('email'),
                'password' => $userModel->password_hash($this->request->getPost('password')),
            ]);
            return redirect()->to(route_to('user.login'))->with('message', "You are registered successfully!, Please login to continue");
        }
        session()->setFlashdata(['validation' => $this->validator]);

        return redirect()->back()->withInput();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(route_to('user.login'));
    }
}
