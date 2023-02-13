<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$articulos = $db->query('select * from articulos order by fecha desc limit 3')->get();

foreach ($articulos as $key => $articulo) {
	$articulos[$key]["descripcion"] = getDescription($articulo["contenido"]);
}

// Renderizar feedback de formulario en caso de envío:
$errores = [];
$exito = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (!Validator::string($_POST['nombre'], 1, 100)) {
		$errores['nombre'] = "El nombre debe tener entre 1 y 100 caracteres.";
	}
	if (!Validator::email($_POST['correo'])) {
		$errores['correo'] = "Se necesita un correo válido.";
	}
	if (!Validator::string($_POST['razon'], 1, 1000)) {
		$errores['razon'] = "El motivo debe tener entre 1 y 1000 caracteres.";
	}

	if (empty($errores)) {
		$db->query("INSERT INTO ayuda(nombre,correo,razon,tipo) VALUES (:nombre, :correo, :razon, :tipo)", [
			'nombre' => $_POST['nombre'], 
			'correo' => $_POST['correo'], 
			'razon' => $_POST['razon'], 
			'tipo' => $_POST['tipo_ayuda'], 
		]);
		$exito = 'Formulario enviado con éxito';
	}
}


view("index.view.php", [
	'articulos' => $articulos,
	'errores' => $errores,
	'exito' => $exito
]);