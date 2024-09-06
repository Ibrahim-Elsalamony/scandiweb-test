<?php

$routes = [
    '/' => 'views/product_list.php',
    '/addproduct' => 'views/add.php',
];

// Create Router and Controller instances
$router = new Router($routes);
$controller = new Controller();

// Get the current URI path
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Direct to the appropriate route
$view = $router->direct($uri);
$controller->loadView($view);
