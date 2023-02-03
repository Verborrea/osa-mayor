<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "epiz_33068761_agustina_db";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$name = $_POST["name"];
	$date = $_POST["date"];
	$email = $_POST["correo"];
	$sexo = $_POST["sexo"];
	$job = $_POST["prof"];
	$numero = $_POST["numero"];
	$resume = $_POST["resumen"];

	$sql = "INSERT INTO voluntarios (nombre,fechaNac,correo,ocupacion,sexo,numeroContacto,sobreMi) VALUES ('$name','$date','$email','$job','$sexo','$numero','$resume')";

	$conn->query($sql);

	$conn->close();

	header("Location: /gracias/{$name}");
?>