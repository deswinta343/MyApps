<?php

use App\Controllers\RegisterController;

$routes->get('/', 'Home::index');

$routes->resource('data', ['controller' => 'RegisterController']);
$routes->match(['post','options'], 'register', 'RegisterController::create');