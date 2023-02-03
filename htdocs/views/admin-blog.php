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
	</head>

	<body>
		<div class="main-layout">
		<header>
			<div id="logo">
				<a href="/">
                    <img src="../media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
                </a>
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
				<div id="admin-header">
					<a href="/admin?tipo=ayuda">Ayuda</a>
					<a href="/admin?tipo=voluntariado">Voluntariado</a>
					<a href="/admin?tipo=contacto">Contacto</a>
					<a href="/admin/blog" class="active">Editar entradas</a>
					<a href="/admin/galeria">Galería</a>
				</div>
			</div>
		</header>
		<main>
			<div id="container">
				<table>
					<tr>
						<th>Categoria</th>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
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

					$sql = "SELECT id,categoria,titulo,fecha FROM articulos";
					$result = $conn->query($sql);                   
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo '<tr>'.
							     '<td>'. $row["categoria"] . '</td>'.
							     '<td>'. $row["titulo"] . '</td>'.
							     '<td>'. $row["fecha"] . '</td>'.
							     '<td><a href="/admin/edit-post?id='. $row["id"] .'">Editar</a></td>'.
							     '<td><a href="/admin/delete-post?id='. $row["id"] .'">Borrar</a></td>'.
							     '</tr>';
						}
					}
					?>
				</table>
				<a href="/admin/edit-post">Añadir entrada</a>
			</div>
		</main>
		<?php include "footer.php" ?>
		</div>
	</body>
</hmtl>