<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Nuazsa\Simplemvc\App\Router;
use Nuazsa\Simplemvc\Controller\HomeController;
use Nuazsa\Simplemvc\Controller\ProductController;
use Nuazsa\Simplemvc\Middleware\AuthMiddleware;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/login', HomeController::class, 'login');
Router::add('GET', '/register',HomeController::class, 'register');
Router::add('GET', '/about',HomeController::class, 'about', [AuthMiddleware::class]);

Router::add('GET', '/product/([0-9a-zA-Z]*)/([0-9]*)', ProductController::class, 'categories');
Router::run();