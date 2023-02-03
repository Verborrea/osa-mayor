<!DOCTYPE html>
<hmtl lang="es-PE">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Agustina y la Osa Mayor | Blog</title>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="icons/site.webmanifest">
		<link href="styles/layout.css" rel="stylesheet">
		<link href="styles/star_sizes.css" rel="stylesheet">
		<link href="styles/header.css" rel="stylesheet">
		<link href="styles/blog.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div id="logo">
				<img src="media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
				<div id="container_gif1"><img id="gif1" src="media/gif1.gif"></div>
				<div id="ursa">
					<img id="star_path" src="media/camino.png">
					<div class="star" id="star1">
						<a href="/">Inicio</a>
					</div>
					<div class="star" id="star2">
						<a href="/nosotros">Nosotros</a>
					</div>
					<div class="star" id="star3">
						<a href="/voluntariado">Volun<br>tari<br>ado</a>
					</div>
					<div class="star" id="star4">
						<a href="/404">Donacio<br>nes</a>
					</div>
					<div class="star" id="star5">
						<a href="/contacto">Con<br>tac<br>to</a>
					</div>
					<div class="star" id="star6">
						<a href="/blog">Blog</a>
					</div>
					<div class="star" id="star7">
						<a href="/404">Tienda</a>
					</div>
				</div>
				<div id="container_gif2"><img id="gif2" img src="media/gif2.gif"></div>
			</div>
		</header>
		<main>
			<div class="btn-holder">
				<a class="b_button" href="/galeria">Galería</a>
				<a class="b_button" id="b_sel" href="/blog">Articulos</a>
			</div>
			<div id="more-container">
            <?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "epiz_33068761_agustina_db";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
				echo "Error";
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT DISTINCT categoria FROM articulos;";
			$result = $conn->query($sql);                   
			if ($result->num_rows > 0) {
				while($columna = $result->fetch_assoc()) {
					$categoria = $columna["categoria"];
					echo '<div class="cat-name">' . $categoria . '</div>';
					echo '<div class="articulos-container">';
					$sub_result = $conn->query("SELECT * FROM articulos WHERE categoria = '$categoria';");                   
					if ($sub_result->num_rows > 0) {
						while($row = $sub_result->fetch_assoc()) {
							$s = html_entity_decode(htmlspecialchars_decode($row["contenido"]));
							$sub = substr($s, 0, 150);
							$contenido =  strip_tags($sub) . "...";
							echo '<a class="otro" href="/articulos/'.$row["id"].'">'.
									'<img class="thumbnail" src="articles/'.$row["portada"].'">'.
									'<div class="otro-info">'.
										'<div class="otro-dat">'.$row["fecha"].'</div>'.
										'<div class="otro-tit">'.$row["titulo"].'</div>'.
										'<div class="otro-aut">POR '.strtoupper($row["autor"]).'</div>'.
										'<div class="otro-res">'.$contenido.'</div>'.
									'</div>'.
								'</a>';
						}
					}
					echo '</div>';
				}
			}
			$conn->close();
			?>
			</div>
		</main>
		<?php include "footer.php" ?>
	</body>
</hmtl>