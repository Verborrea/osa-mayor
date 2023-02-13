<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$articulos = $db->query('SELECT DISTINCT categoria FROM articulos')->get();

$categorias = array();
foreach ($articulos as $key => $value) {
    $categorias[$articulos[$key]["categoria"]] = [];
}

$articulos = $db->query('SELECT * FROM articulos')->get();

foreach ($articulos as $key=>$articulo) {
    $articulos[$key]["contenido"] = getDescription($articulo["contenido"]);
}

foreach ($articulos as $articulo)  {
    array_push($categorias[$articulo["categoria"]], $articulo);
}

view("blog.view.php", [
    'categorias' => $categorias,
	'articulos' => $articulos
]);