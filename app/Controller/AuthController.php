<?php

namespace Nuazsa\Simplemvc\Controller;

use Nuazsa\Simplemvc\App\View;

/**
 * Class AuthController
 *
 * This class handles authentication-related actions such as logging in, authenticating, and logging out.
 */
class AuthController
{
    /**
     * Display the login page.
     *
     * @return void
     */
    public function index() 
    {
        $model = [
            'title' => 'Login'
        ];

        View::render('home/login', $model);
    }

    /**
     * Authenticate the user.
     *
     * This method checks the provided username and password.
     * If the credentials are correct, it starts a session and redirects to the /about page.
     * If the credentials are incorrect, it displays an authentication failed message.
     *
     * @return void
     */
    public function authenticate()  
    {
        $username = $_POST['username'];
        $pass = $_POST['password'];

        if ($username == 'admin' && $pass == 'admin') {
            session_start();

            $_SESSION['username'] = $username;

            header('Location: /about');
            exit;
        }

        $model = [
            'title' => 'Login',
            'msg' => 'Authentication failed'
        ];
        http_response_code(401);
        View::render('home/login', $model);
    }

    /**
     * Log out the user.
     *
     * This method destroys the session and redirects to the login page.
     *
     * @return void
     */
    public function logout()
    {
        session_start();

        session_unset();
        session_destroy();

        header('Location: /login');
        exit;
    }
}