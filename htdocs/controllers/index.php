<?php

require('Database.php');
require('Validator.php');

$db = new Database();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (!Validator::string($_POST['nombre'], 1, 100)) {
		$errors['nombre'] = "El nombre debe tener entre 1 y 100 caracteres.";
	}
	if (!Validator::email($_POST['correo'])) {
		$errors['correo'] = "Se necesita un correo válido.";
	}
	if (!Validator::string($_POST['razon'], 1, 1000)) {
		$errors['razon'] = "El motivo debe tener entre 1 y 1000 caracteres.";
	}

	if (empty($errors)) {
		$db->query("INSERT INTO ayuda(nombre,correo,razon,tipo) VALUES (:nombre, :correo, :razon, :tipo)", [
			'nombre' => $_POST['nombre'], 
			'correo' => $_POST['correo'], 
			'razon' => $_POST['razon'], 
			'tipo' => $_POST['tipo_ayuda'], 
		]);
		$exito = 'Formulario enviado con éxito';
	}
}

$articulos = $db->query("SELECT * FROM articulos ORDER BY fecha DESC LIMIT 3")->fetchAll();

foreach ($articulos as $key => $articulo) {
	$articulos[$key]["descripcion"] = substr(strip_tags($articulo["contenido"]), 0, 100);
}

require('views/index.view.php');