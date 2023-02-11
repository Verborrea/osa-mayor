<?php

require('Database.php');

$db = new Database();
$articulo = $db->query("SELECT * FROM articulos where id = ?", [$_GET['id']])->fetch();

$articulo["descripcion"] = substr(strip_tags($articulo["contenido"]), 0, 100).'...';


$otros = $db->query("SELECT * FROM articulos where id <> ? ORDER BY RAND() LIMIT 2", [$_GET['id']])->fetchAll();

foreach ($otros as $key => $otro) {
	$otros[$key]["descripcion"] = substr(strip_tags($otro["contenido"]), 0, 100).'...';
}

require('views/articulo.view.php');