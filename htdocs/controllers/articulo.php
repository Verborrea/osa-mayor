<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$articulo = $db->query('SELECT * FROM articulos where id = :id', [
	'id' => $_GET['id']
])->find();
$articulo["descripcion"] = getDescription($articulo["contenido"]);


$otros = $db->query("SELECT * FROM articulos where id <> ? ORDER BY RAND() LIMIT 2", [$_GET['id']])->get();
foreach ($otros as $key => $otro) {
	$otros[$key]["descripcion"] = getDescription($otro["contenido"]);
}


view("articulo.view.php", [
	'articulo' => $articulo,
	'otros' => $otros
]);