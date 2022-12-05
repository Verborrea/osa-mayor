<!DOCTYPE html>
<hmtl>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Website Manager</title>
		<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="fav/site.webmanifest">
		<link href="styles/layout.css" rel="stylesheet">
		<link href="styles/header.css" rel="stylesheet">
		<link href="styles/forms.css" rel="stylesheet">
	</head>

	<body>
		<header>
			<div id="logo">
				<img src="media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
				<div id="admin-header">
					<a href="admin.php" class="active">Ayuda</a>
					<a href="admin.php">Voluntariado</a>
					<a href="contacto.php">Contacto</a>
					<a href="edit.html">Editar entradas</a>
					<a href="upload.html">Galería</a>
				</div>
			</div>
		</header>
		<main>
			<div id="container">
				<table>
                    <?php
						$servername = "sql310.epizy.com";
						$username = "epiz_33068761";
						$password = "Tp8zxfonyYwji";
						$dbname = "epiz_33068761_agustina_db";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

                        $id = $_GET["id"];
                        
                        if ($_GET["tipo"] == "Ayuda"){
                            $sql = "SELECT nombre,correo,razon,tipo FROM ayuda WHERE id = '$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                if ($row["tipo"] == "1") { $tipo = "Quiero Ayudar"; }
                                else { $tipo = "Necesito Ayuda"; }

                                echo "<tr><th>Nombre</th><td>".$row["nombre"]."</td></tr>".
                                     "<tr><th>Email</th><td>".$row["correo"]."</td></tr>".
                                     "<tr><th>Motivo</th><td>".$tipo."</td></tr>".
                                     "<tr><th>Razón</th><td>".$row["razon"]."</td></tr>";
                            }
                            } else {
                            echo "<th>0 results<th>";
                            }
                        }
                        else if ($_GET["tipo"] == "Voluntariado"){
                            $sql = "SELECT nombre,fechaNac,email,ocupacion,sexo,numeroContacto,sobreMi FROM voluntarios WHERE id = '$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                                echo "<tr><th>Nombre</th><td>".$row["nombre"]."</td></tr>".
                                     "<tr><th>Fecha de Nacimiento</th><td>".$row["fechaNac"]."</td></tr>".
                                     "<tr><th>Email</th><td>".$row["email"]."</td></tr>".
                                     "<tr><th>Ocupación</th><td>".$row["ocupacion"]."</td></tr>".
                                     "<tr><th>Sexo</th><td>".$row["sexo"]."</td></tr>".
                                     "<tr><th>Teléfono</th><td>".$row["numeroContacto"]."</td></tr>".
                                     "<tr><th>Resumen</th><td>".$row["sobreMi"]."</td></tr>";
                            }
                            } else {
                            echo "<th>0 results<th>";
                            }
                        }
                        else if ($_GET["tipo"] == "Contacto"){
                            $sql = "SELECT nombre,email,mensaje FROM contacto WHERE id = '$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                                echo "<tr><th>Nombre</th><td>".$row["nombre"]."</td></tr>".
                                     "<tr><th>Email</th><td>".$row["email"]."</td></tr>".
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
		<footer>
			<img src="media/oso.png" alt="Logotipo Oso">
			<br>
			<a href="https://www.instagram.com/agustinaylaosamayor" target="_blank"><img class="social_media"
					src="media/svg/insta.svg"></a>
			<a href="https://web.facebook.com/agustinaylaosamayor" target="_blank"><img class="social_media"
					src="media/svg/fb.svg"></a>
			<a href="https://www.youtube.com/channel/UC5gVn5qG1ZIVy-9mxkg0w7Q" target="_blank"><img class="social_media"
					src="media/svg/yt.svg"></a>
			<div id="footer_navbar">
				<a href="terminos.html">Términos de uso</a>
				·
				<a href="privacidad.html">Política de Privacidad</a>
				·
				<a href="contacto.html">Contacto</a>
			</div>
			<p id="copyright">© 2022 Agustina y la Osa Mayor</p>
		</footer>
	</body>
</hmtl>