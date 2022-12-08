<?php
require_once __DIR__ . '/../vendor/autoload.php';

use tegar\Freshmarket\App\Router;
use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Controller\AuthController;
use tegar\Freshmarket\Controller\CategoryController;
use tegar\Freshmarket\Controller\DasboardController;
use tegar\Freshmarket\Controller\HomeController;
use tegar\Freshmarket\Controller\MainController;
use tegar\Freshmarket\Controller\ProductController;
use tegar\Freshmarket\Middleware\AuthMiddleware;
use tegar\Freshmarket\Middleware\MustLoginMiddleware;
use tegar\Freshmarket\Middleware\MustNotLoginMiddleware;




Router::add('GET', '/', MainController::class, 'index', []);

Router::add('GET', '/auth/login', AuthController::class, 'Login', [MustNotLoginMiddleware::class]);
Router::add('POST', '/auth/login', AuthController::class, 'postLogin', [MustNotLoginMiddleware::class]);


Router::add('GET', '/admin/overview', DasboardController::class, 'overview', [MustLoginMiddleware::class]);
Router::add('GET', '/admin/product', ProductController::class, 'index', [MustLoginMiddleware::class]);
Router::add('GET', '/admin/product/add', ProductController::class, 'add', [MustLoginMiddleware::class]);
Router::add('POST', '/admin/product/add', ProductController::class, 'addPost', [MustLoginMiddleware::class]);
Router::add('POST', '/admin/product/delete/([0-9-zA-Z]*)', ProductController::class, 'deletePost', [MustLoginMiddleware::class]);
Router::add('GET', '/admin/product/edit/([0-9-zA-Z]*)', ProductController::class, 'edit', [MustLoginMiddleware::class]);
Router::add('POST', '/admin/product/edit/([0-9-zA-Z]*)', ProductController::class, 'editPost', [MustLoginMiddleware::class]);

// Category
Router::add('GET', '/admin/category', CategoryController::class, 'index', [MustLoginMiddleware::class]);
Router::add('GET', '/admin/category/add', CategoryController::class, 'add', [MustLoginMiddleware::class]);
Router::add('POST', '/admin/category/add', CategoryController::class, 'addPost', [MustLoginMiddleware::class]);
Router::add('GET', '/admin/category/edit/([0-9-zA-Z]*)', CategoryController::class, 'edit', [MustLoginMiddleware::class]);
Router::add('POST', '/admin/category/edit/([0-9-zA-Z]*)', CategoryController::class, 'editPost', [MustLoginMiddleware::class]);





Router::run();