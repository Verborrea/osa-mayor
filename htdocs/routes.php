<?php

$router->get('/', 'controllers/index.php');
$router->get('/nosotros', 'controllers/nosotros.php');
$router->get('/voluntariado', 'controllers/voluntariado.php');
$router->get('/contacto', 'controllers/contacto.php');
$router->get('/blog', 'controllers/blog.php');
$router->get('/galeria', 'controllers/galeria.php');
$router->get('/articulo', 'controllers/articulo.php');

// Envio de formularios
$router->post('/', 'controllers/index.php');
$router->post('/voluntariado', 'controllers/voluntariado.php');
$router->post('/contacto', 'controllers/contacto.php');


$router->get('/admin/fotos', 'controllers/fotos/index.php');
$router->delete('/admin/foto', 'controllers/fotos/destroy.php');
// $router->get('/notes', 'controllers/notes/index.php');
// $router->get('/note', 'controllers/notes/show.php');
// $router->delete('/note', 'controllers/notes/destroy.php');

// $router->get('/note/edit', 'controllers/notes/edit.php');
// $router->patch('/note', 'controllers/notes/update.php');

// $router->get('/notes/create', 'controllers/notes/create.php');
// $router->post('/notes', 'controllers/notes/store.php');

