<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/nosotros' => 'controllers/nosotros.php',
    '/voluntariado' => 'controllers/voluntariado.php',
    '/contacto' => 'controllers/contacto.php',
    '/blog' => 'controllers/blog.php',
    '/galeria' => 'controllers/galeria.php',
    '/articulo' => 'controllers/articulo.php',
];

function abort($code) {
    http_response_code($code);
    require "views/{$code}.php";
}

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort(404);
}