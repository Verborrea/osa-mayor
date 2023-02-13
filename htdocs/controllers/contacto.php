<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

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
	if (!Validator::string($_POST['mensaje'], 1)) {
		$errores['mensaje'] = "El mensaje debe tener al menos un caracter.";
	}

	if (empty($errores)) {
		$db->query("insert into contacto(nombre,correo,mensaje) values (:nombre, :correo, :mensaje)", [
			'nombre' => $_POST['nombre'], 
			'correo' => $_POST['correo'], 
			'mensaje' => $_POST['mensaje']
		]);
		$exito = 'Gracias por comunicarte con nosotros. En breve nos pondremos en contacto contigo';
	}
}


view("contacto.view.php", [
	'errores' => $errores,
	'exito' => $exito
]);