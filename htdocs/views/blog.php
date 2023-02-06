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
		<?php include "header.php" ?>
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