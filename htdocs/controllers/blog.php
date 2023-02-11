<?php

require('Database.php');

$db = new Database();
$articulos = $db->query("SELECT DISTINCT categoria FROM articulos")->fetchAll();

$categorias = array();
foreach ($articulos as $key => $value) {
    $categorias[$articulos[$key]["categoria"]] = [];
}

$articulos = $db->query("SELECT * FROM articulos")->fetchAll();

foreach ($articulos as $key=>$articulo) {
    $articulos[$key]["contenido"] = substr(strip_tags($articulo["contenido"]), 0, 100);
}

foreach ($articulos as $articulo)  {
    array_push($categorias[$articulo["categoria"]], $articulo);
}

require('views/blog.view.php');