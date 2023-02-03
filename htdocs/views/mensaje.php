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
		<link href="../styles/layout.css" rel="stylesheet">
		<link href="../styles/header.css" rel="stylesheet">
		<link href="../styles/forms.css" rel="stylesheet">
	</head>

	<body>
	<div class="main-layout">
		<header>
			<div id="logo">
				<img src="../media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
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
			<div id="container">
				<table>
                    <?php
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "epiz_33068761_agustina_db";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

                        $id = $_GET["id"];
                        
                        if ($_GET["tipo"] == "ayuda"){
                            $sql = "SELECT nombre,correo,razon,tipo FROM ayuda WHERE id = '$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                if ($row["tipo"] == "1") { $tipo = "Quiero Ayudar"; }
                                else { $tipo = "Necesito Ayuda"; }

                                echo "<tr><th>Nombre</th><td>".$row["nombre"]."</td></tr>".
                                     "<tr><th>Correo</th><td>".$row["correo"]."</td></tr>".
                                     "<tr><th>Motivo</th><td>".$tipo."</td></tr>".
                                     "<tr><th>Razón</th><td>".$row["razon"]."</td></tr>";
                            }
                            } else {
                            echo "<th>0 results<th>";
                            }
                        }
                        else if ($_GET["tipo"] == "voluntariado"){
                            $sql = "SELECT nombre,fechaNac,correo,ocupacion,sexo,numeroContacto,sobreMi FROM voluntarios WHERE id = '$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                                echo "<tr><th>Nombre</th><td>".$row["nombre"]."</td></tr>".
                                     "<tr><th>Fecha de Nacimiento</th><td>".$row["fechaNac"]."</td></tr>".
                                     "<tr><th>Correo</th><td>".$row["correo"]."</td></tr>".
                                     "<tr><th>Ocupación</th><td>".$row["ocupacion"]."</td></tr>".
                                     "<tr><th>Sexo</th><td>".$row["sexo"]."</td></tr>".
                                     "<tr><th>Teléfono</th><td>".$row["numeroContacto"]."</td></tr>".
                                     "<tr><th>Resumen</th><td>".$row["sobreMi"]."</td></tr>";
                            }
                            } else {
                            echo "<th>0 results<th>";
                            }
                        }
                        else if ($_GET["tipo"] == "contacto"){
                            $sql = "SELECT nombre,correo,mensaje FROM contacto WHERE id = '$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                                echo "<tr><th>Nombre</th><td>".$row["nombre"]."</td></tr>".
                                     "<tr><th>Correo</th><td>".$row["correo"]."</td></tr>".
                                     "<tr><th>Mensaje</th><td>".$row["mensaje"]."</td></tr>";
                            }
                            } else {
                            echo "<th>0 results<th>";
                            }
                        }
                    ?>

				</table>
				<a href="javascript:history.back()">Regresar</a>
			</div>
            
		</main>
		<?php include "footer.php" ?>
	</div>
	</body>
</hmtl>