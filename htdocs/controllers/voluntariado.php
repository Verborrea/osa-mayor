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
  if (!Validator::string($_POST['prof'], 1, 100)) {
		$errores['nombre'] = "La profesión debe tener entre 1 y 100 caracteres.";
	}
	if (!Validator::string($_POST['resumen'], 50)) {
		$errores['mensaje'] = "El resumen debe tener al menos 50 caracteres.";
	}

	if (empty($errores)) {
		$db->query("insert into voluntarios(nombre,correo,fechaNac,ocupacion,sexo,numeroContacto,sobreMi) values (:nombre, :correo, :fechaNac, :ocupacion, :sexo, :numeroContacto, :sobreMi)", [
			'nombre' => $_POST['nombre'], 
			'correo' => $_POST['correo'], 
			'fechaNac' => $_POST['date'],
      'ocupacion' => $_POST['prof'], 
			'sexo' => $_POST['sexo'], 
			'numeroContacto' => $_POST['numero'],
      'sobreMi' => $_POST['resumen'],
		]);
		$exito = 'Gracias por enviar tu solicitud. En breve nos pondremos en contacto contigo';
	}
}


view("voluntariado.view.php", [
	'errores' => $errores,
	'exito' => $exito
]);