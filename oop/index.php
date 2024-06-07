<?php

spl_autoload_register(function ($controller) {
    require_once $controller.".php";
});

Router::get('/', [\Http\Controllers\HomeController::class, 'index']);
Router::get('/about', [\Http\Controllers\HomeController::class, 'about']);
Router::get('/products', [\Http\Controllers\HomeController::class, 'products']);
Router::get('/product/{id}/{slug}', [\Http\Controllers\HomeController::class, 'product']);
Router::get('/services', [\Http\Controllers\HomeController::class, 'services']);

Router::routes();