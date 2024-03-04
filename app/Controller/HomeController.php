<?php

namespace Nuazsa\Simplemvc\Controller;

use Nuazsa\Simplemvc\App\View;

class HomeController
{
    public function index(): void
    {
        $model = [
            'title' => 'Home',
            'content' => 'Welcome to Simple PHP MVP'
        ];

        View::render('home/index', $model);
    }

    public function login(): void
    {
        var_dump($_POST['username']);
        $request = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];

        $model = [
            'title' => 'Login'
        ];

        $user = [

        ];

        $respons = [
            'messege' => 'Login Succes'
        ];

        View::render('home/login', $model);
    }

    public function register(): void
    {
        echo "Controller register";
    }

    public function about(): void
    {
        echo "Develop By: Nur Azis Saputra";
    }
}
