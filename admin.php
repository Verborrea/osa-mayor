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
					<a href="admin.php?tipo=Ayuda" <?php if ($_GET["tipo"] == "Ayuda"){ echo "class='active'"; }?>>Ayuda</a>
					<a href="admin.php?tipo=Voluntariado" <?php if ($_GET["tipo"] == "Voluntariado"){ echo "class='active'"; }?>>Voluntariado</a>
					<a href="admin.php?tipo=Contacto" <?php if ($_GET["tipo"] == "Contacto"){ echo "class='active'"; }?>>Contacto</a>
					<a href="edit.html">Editar entradas</a>
					<a href="upload.html">Galería</a>
				</div>
			</div>
		</header>
		<main>
			<div id="container">
                <?php if (!isset($_GET["tipo"])){
                    echo "
					<div class='mensajeAdmin'>
                        Bienvenido al Administrador de Agustina y la Osa Mayor <br>
                        Por favor, elija una de las opciones de la lista de arriba.
                    </div>
                    ";
                }?>
                <?php if (isset($_GET["exito"])){
                    echo "
					<div class='alarm'>
                        Registro eliminado con éxito!
                    </div>
                    ";
                }?>
				<table id="mytable">
                    <?php
                        if($_GET["tipo"] == "Voluntariado"){
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
                        }
                        else if($_GET["tipo"] == "Ayuda"){
                            echo "<tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Motivo</th>
                                    <th>Mensaje</th>
                                    <th>Eliminar</th>
                                    </tr>";
                        }
                        else if($_GET["tipo"] == "Contacto"){
                            echo "<tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Mensaje</th>
                                    <th>Eliminar</th>
                                    </tr>";
                        }
                    ?>
                    
                    <?php
                        $servername = "sql310.epizy.com";
                        $username = "epiz_33068761";
                        $password = "Tp8zxfonyYwji";
                        $dbname = "epiz_33068761_agustina_db";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            echo "Error";
                        die("Connection failed: " . $conn->connect_error);
                        }

                        if ($_GET["tipo"] == "Ayuda"){ 
                            $sql = "SELECT id,nombre,correo,tipo FROM ayuda";
                            $result = $conn->query($sql);                   
                            if ($result->num_rows > 0) {
                                // output data of each row
                                //echo "<table>";
                                while($row = $result->fetch_assoc()) {
                                    if ($row["tipo"] == "1") { $tipo = "Quiero Ayudar";}
                                    else { $tipo = "Necesito Ayuda"; }
                                    echo "<tr><td>".$row["nombre"].
                                         "</td><td>".$row["correo"].
                                         "</td><td>".$tipo.
                                         "</td><td><a href='mensaje.php?tipo=Ayuda&id=".$row["id"]."'>Ver Mensaje</a>".
                                         "</td><td><a href='delete.php?tipo=Ayuda&id=".$row["id"]."'>Eliminar</a>
                                         </td></tr>";
                                }
                                //echo "</table>";
                            }
                        }
                        else if ($_GET["tipo"] == "Voluntariado"){ 
                            $sql = "SELECT id,nombre,fechaNac,email,ocupacion,sexo,numeroContacto FROM voluntarios";
                            $result = $conn->query($sql);                   
                            if ($result->num_rows > 0) {
                                // output data of each row
                                //echo "<table>";
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>".$row["nombre"].
                                         "</td><td>".$row["fechaNac"].
                                         "</td><td>".$row["email"].
                                         "</td><td>".$row["ocupacion"].
                                         "</td><td>".$row["sexo"].
                                         "</td><td>".$row["numeroContacto"].
                                         "</td><td><a href='mensaje.php?tipo=Voluntariado&id=".$row["id"]."'>Ver resumen</a>
                                         </td><td><a href='delete.php?tipo=Voluntariado&id=".$row["id"]."'>Eliminar</a>
                                         </td></tr>";
                                }
                                //echo "</table>";
                            }
                        }    
                        else if ($_GET["tipo"] == "Contacto"){ 
                            $sql = "SELECT id,nombre,email FROM contacto";
                            $result = $conn->query($sql);                   
                            if ($result->num_rows > 0) {
                                // output data of each row
                                //echo "<table>";
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>".$row["nombre"].
                                         "</td><td>".$row["email"].
                                         "</td><td><a href='mensaje.php?tipo=Contacto&id=".$row["id"]."'>Ver Mensaje</a>
                                         </td><td><a href='delete.php?tipo=Contacto&id=".$row["id"]."'>Eliminar</a>
                                         </td></tr>";
                                }
                                //echo "</table>";
                            }
                        }

                        $conn->close();
                    ?>
				</table>
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