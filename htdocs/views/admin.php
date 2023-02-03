<?php
if (isset($_GET["tipo"]))
	$tipo = $_GET["tipo"];
?>
<!DOCTYPE html>
<hmtl lang="es-PE">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Website Manager</title>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="icons/site.webmanifest">
		<link href="styles/layout.css" rel="stylesheet">
		<link href="styles/header.css" rel="stylesheet">
		<link href="styles/forms.css" rel="stylesheet">
	</head>

	<body>
		<div class="main-layout">
		<header>
			<div id="logo">
                <a href="/">
                    <img src="media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
                </a>
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
				<div id="admin-header">
					<a href="/admin?tipo=ayuda" <?php
					if (isset($tipo) && $tipo == "ayuda"){ echo "class='active'"; }
					?>>Ayuda</a>
					<a href="/admin?tipo=voluntariado" <?php
					if (isset($tipo) && $tipo == "voluntariado"){ echo "class='active'"; }
					?>>Voluntariado</a>
					<a href="/admin?tipo=contacto" <?php
					if (isset($tipo) && $tipo == "contacto"){ echo "class='active'"; }
					?>>Contacto</a>
					<a href="/admin/blog">Editar entradas</a>
					<a href="/admin/galeria">Galería</a>
				</div>
			</div>
		</header>
		<main>
			<?php
			if (isset($_GET["exito"])){
				echo "<div id='alarm'>Registro eliminado con éxito!</div>";
			}
			?>
			<div id="container">
			<?php
			if (!isset($_GET["tipo"])){
				echo "
				<div class='mensajeAdmin'>
					Bienvenido al Administrador de Agustina y la Osa Mayor <br>
					Por favor, elija una de las opciones de la lista de arriba.
				</div>
				";
			}
			else {
				echo '<table id="mytable">';

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

				if ($tipo == "ayuda"){ 
					echo "<tr>
							<th>Nombre</th>
							<th>Email</th>
							<th>Motivo</th>
							<th>Mensaje</th>
							<th>Eliminar</th>
						</tr>";
					$sql = "SELECT id,nombre,correo,tipo FROM ayuda";
					$result = $conn->query($sql);                   
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
								if ($row["tipo"] == "1") { $tipo = "Quiero Ayudar";}
								else { $tipo = "Necesito Ayuda"; }
								echo "<tr><td>".$row["nombre"].
											"</td><td>".$row["correo"].
											"</td><td>".$tipo.
											"</td><td><a href='admin/mensaje?tipo=ayuda&id=".$row["id"]."'>Ver Mensaje</a>".
											"</td><td><a href='admin/delete-form?tipo=ayuda&id=".$row["id"]."'>Eliminar</a>
											</td></tr>";
						}
					}
				}
				else if ($tipo == "voluntariado"){
					echo "<tr>
							<th>Nombre</th>
							<th>Fecha de Nac.</th>
							<th>Correo</th>
							<th>Ocupación</th>
							<th>Sexo</th>
							<th>Teléfono</th>
							<th>Resumen</th>
							<th>Eliminar</th>
						</tr>";
					$sql = "SELECT id,nombre,fechaNac,correo,ocupacion,sexo,numeroContacto FROM voluntarios";
					$result = $conn->query($sql);                   
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>".$row["nombre"].
								"</td><td>".$row["fechaNac"].
								"</td><td>".$row["correo"].
								"</td><td>".$row["ocupacion"].
								"</td><td>".$row["sexo"].
								"</td><td>".$row["numeroContacto"].
								"</td><td><a href='admin/mensaje?tipo=voluntariado&id=".$row["id"]."'>Ver resumen</a>
								</td><td><a href='admin/delete-form?tipo=voluntariado&id=".$row["id"]."'>Eliminar</a>
								</td></tr>";
						}
					}
				}    
				else if ($tipo == "contacto"){
					echo "<tr>
							<th>Nombre</th>
							<th>Email</th>
							<th>Mensaje</th>
							<th>Eliminar</th>
						</tr>";
					$sql = "SELECT id,nombre,correo FROM contacto";
					$result = $conn->query($sql);                   
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>".$row["nombre"].
								"</td><td>".$row["correo"].
								"</td><td><a href='admin/mensaje?tipo=contacto&id=".$row["id"]."'>Ver Mensaje</a>
								</td><td><a href='admin/delete-form?tipo=contacto&id=".$row["id"]."'>Eliminar</a>
								</td></tr>";
						}
					}
				}

				$conn->close();
			}

			echo '</table>';
			?>
			</div>
		</main>
		<?php include "footer.php" ?>
		</div>
	</body>
</hmtl>