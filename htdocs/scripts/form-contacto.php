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
	$msg = $_POST["msg"];

	$sql = "INSERT INTO contacto (nombre,correo,mensaje) VALUES ('$name','$email','$msg')";
	$conn->query($sql);

	$conn->close();

	header("Location: /gracias/{$name}");
?>