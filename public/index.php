<?php

include_once '../includes/app.php';

use MVC\Router;
use Controller\AdminController;
use Controller\IndexController;

$router = new Router();

$router->get('/', [IndexController::class, 'Index']);
$router->post('/', [IndexController::class, 'Index']);

// Area privada
$router->get('/login', [AdminController::class, 'Login']);
$router->post('/login', [AdminController::class, 'Login']);
$router->get('/logout', [AdminController::class, 'Logout']);
$router->get('/registerAdmin', [AdminController::class, 'Register']);
$router->post('/registerAdmin', [AdminController::class, 'Register']);



$router->get('/admin', [AdminController::class, 'Index']);

$router->comprobarRutas();
