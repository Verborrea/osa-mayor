<!DOCTYPE html>
<hmtl>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Website Manager</title>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="icons/site.webmanifest">
		<link href="../styles/layout.css" rel="stylesheet">
		<link href="../styles/header.css" rel="stylesheet">
		<link href="../styles/forms.css" rel="stylesheet">
		<link href="../styles/upload.css" rel="stylesheet">
	</head>

	<body>
		<header>
			<div id="logo">
				<img src="../media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
				<div id="admin-header">
					<a href="/admin?tipo=ayuda">Ayuda</a>
					<a href="/admin?tipo=voluntariado">Voluntariado</a>
					<a href="/admin?tipo=contacto">Contacto</a>
					<a href="/admin/blog">Editar entradas</a>
					<a href="/admin/galeria" class="active">Galería</a>
				</div>
			</div>
		</header>
		<main>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "epiz_33068761_agustina_db";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				echo "Error";
				die("Connection failed: " . $conn->connect_error);
			}
			$nombre = $_GET["name"];
			$sql = "SELECT id,nombre,descripcion FROM galeria WHERE nombre = '$nombre'";
			$result = $conn->query($sql);                   
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<form class="edit-imgbox" method="POST" action="change-desc.php">'.
					'<div class="edit-picbox"><img class="edit-img" src="../gallery/' . $row["nombre"] . '"></div>'.
					'<textarea name="new_description" class="edit-desc" rows="3">' . $row["descripcion"] . '</textarea>'.
					'<div class="icon-box">'.
					'<input type="submit" class="icon" value="Guardar">'.
					'<a class="icon" id="return-btn" href="/admin/galeria">Regresar</a>'.
					'<input type="hidden" id="imgId" name="imgId" value="'.$row["id"].'" />'.
					'</div></form>';
				}
			}
			$conn->close();
		?>
		</main>
		<?php include "footer.php" ?>
	</body>
</hmtl>
		