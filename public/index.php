<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Nuazsa\Simplemvc\App\Router;
use Nuazsa\Simplemvc\Controller\AuthController;
use Nuazsa\Simplemvc\Controller\HomeController;
use Nuazsa\Simplemvc\Controller\ProductController;
use Nuazsa\Simplemvc\Middleware\AuthMiddleware;

/**
 * Main routing configuration script
 *
 * This script sets up the routes for the application using the Router class.
 * It also applies middleware where necessary to protect routes.
 */

// Define a GET route for the home page, protected by AuthMiddleware
Router::get('/', HomeController::class, 'index', [AuthMiddleware::class]);

// Define a GET route for the login page
Router::get('/login', AuthController::class, 'index');

// Define a GET route for logging out
Router::get('/logout', AuthController::class, 'logout');

// Define a POST route for authentication
Router::post('/authenticate', AuthController::class, 'authenticate');

// Define a GET route for the registration page
Router::get('/register', HomeController::class, 'register');

// Define a GET route for the about page, protected by AuthMiddleware
Router::get('/about', HomeController::class, 'about', [AuthMiddleware::class]);

// Define a GET route for product categories with two dynamic parameters
Router::get('/product/([0-9a-zA-Z]*)/([0-9]*)', ProductController::class, 'categories');

// Run the router to handle the incoming request
Router::run();