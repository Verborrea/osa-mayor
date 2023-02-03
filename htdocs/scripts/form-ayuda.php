<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "epiz_33068761_agustina_db";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$name = $_POST["nombre"];
	$email = $_POST["correo"];
	$razon = $_POST["razon"];
	$tipo = $_POST['tipo_ayuda'];

	$sql = "INSERT INTO ayuda (nombre,correo,razon,tipo) VALUES ('$name','$email','$razon','$tipo')";
	$conn->query($sql);

	$conn->close();

	header("Location: /gracias/{$name}");
?>