<?php
require 'classes/Router.php';
require 'classes/Controller.php';
require 'config/routes.php';

// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// $routes = [
//     '/' => 'views/show.php',
//     '/add' => 'views/add.php',
// ];

// function abort()
// {
//     http_response_code(404);
//     require 'views/404.php';
//     die();
// }

// if (array_key_exists($uri, $routes)) {
//     require $routes[$uri];
// } else {
//     abort();
// }


// // Load routes from configuration
// $routes = require 'config/routes.php';

// // Create Router and Controller instances
// $router = new Router($routes);
// $controller = new Controller();

// // Get the current URI path
// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// // Direct to the appropriate route
// $view = $router->direct($uri);
// $controller->loadView($view);
