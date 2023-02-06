<!DOCTYPE html>
<hmtl lang="es-PE">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Agustina y la Osa Mayor</title>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="icons/site.webmanifest">
		<link href="styles/layout.css" rel="stylesheet">
		<link href="styles/star_sizes.css" rel="stylesheet">
		<link href="styles/header.css" rel="stylesheet">
		<link href="styles/index.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css"
			rel="stylesheet" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js"
			crossorigin="anonymous" defer></script>
	</head>

	<body>
		<?php include "header.php" ?>
		<main>
			<section id="intro">
				<img id="intro_img" src="media/imgs/intro.jpg" alt="Ayuda Social">
				<div id="introbox">
					<h1>Somos <b>facilitadores</b> solidarios</h1>
					<div id="introbox-cont">
						<div>
							Agustina y la Osa Mayor es una ONG sin fines de lucro. Somos embajadores de ayuda, no solo
							dando a quienes
							les falta, sino comunicando al resto del mundo que hay todavía mucho por hacer, sacando a la
							luz la
							necesidad del país.
						</div>
						<div>
							Entablamos diálogo entre las instituciones o personas que necesitan y los que desean ayudar
							pero no saben
							cómo.
						</div>
						<a href="/nosotros">Conoce más aquí...</a>
					</div>
				</div>
			</section>
			<section id="prensa">
				<h1>Dejando una <b>huella</b> en la prensa</h1>
				<div id="article-container">
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

					$sql = "SELECT * FROM `articulos` ORDER BY fecha DESC LIMIT 3";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$s = html_entity_decode(htmlspecialchars_decode($row["contenido"]));
							$sub = substr($s, 0, 150);
							$contenido = strip_tags($sub) . "...";
							echo '<div class="article">' ,
									'<img src="articles/'.$row["portada"].'">'.
									'<div class="art-tit">'.$row["titulo"].'</div>' .
									'<div class="art-res">'.$contenido.'</div>' .
									'<a href="/articulos/'.$row["id"].'">Leer más</a>' .
								 '</div>';
						}
					}

					$conn->close();
					?>
				</div>
			</section>
			<section id="familia">
				<h1>Conoce a nuestra <b>familia</b></h1>
				<div class="swiffy-slider">
					<ul class="slider-container">
						<li>
							<div class="fam-container">
								<img class="fam-img" src="media/imgs/angela.png">
								<div class="fam-mes">
									<div class="message">
										“Agustina es mi familia, es encontrar el lugar en el que mi propósito de vida,
										mi pasión y lo que hago están en sintonía. Nada es tan poderoso como vivir para
										servir.”
									</div>
									<div class="author">
										Angela Samamé
									</div>
									<div class="rol">
										Fundadora
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="fam-container">
								<img class="fam-img" src="media/imgs/angela.png">
								<div class="fam-mes">
									<div class="message">
										“Este es un mensaje de prueba. Aquí debería ir el mensaje del miembro mencionado.”
									</div>
									<div class="author">
										Otro Miembro
									</div>
									<div class="rol">
										Otro Rol
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="fam-container">
								<img class="fam-img" src="media/imgs/angela.png">
								<div class="fam-mes">
									<div class="message">
										“Agustina es mi familia, es encontrar el lugar en el que mi propósito de vida,
										mi pasión y lo que hago están en sintonía. Nada es tan poderoso como vivir para
										servir.”
									</div>
									<div class="author">
										Otro Miembro
									</div>
									<div class="rol">
										Otro rol
									</div>
								</div>
							</div>
						</li>
					</ul>

					<button type="button" class="slider-nav"></button>
					<button type="button" class="slider-nav slider-nav-next"></button>

					<div class="slider-indicators">
						<button class="active"></button>
						<button></button>
						<button></button>
					</div>
				</div>
			</section>
			<section id="ayuda">
				<h1>¿Necesitas <b>ayuda</b> o quieres ayudar?</h1>
				<div id="ayuda_flex">
					<div id="ayuda_flex1">
						<p>
							Somos facilitadores solidarios, así que si estás interesado en ayudar a otros o ya lo estás
							haciendo y
							necesitas una mano, no dudes en ponerte en contacto con nosotros.
						</p>
						<p>
							Llena el formulario y forma parte de esta constelación para que brilles con más fuerza.
						</p>
						<a href="voluntariado.html#image-container">Inscribete como voluntario aquí-></a>
					</div>
					<div id="ayuda_flex2">
						<form action="form-ayuda.php" method="post">
							<label id="name-l">Nombre o Razón Social</label>
							<input id="name" name="nombre" type="text" placeholder="Nombre o Razón Social" required>
							<label id="correo-l">Correo Electrónico</label>
							<input id="correo" name="correo" type="email" placeholder="Correo Electrónico" required >
							<label id="msg-l">¿Por qué?</label>
							<textarea id="msg" name="razon" rows="4" placeholder="¿Por qué?" required></textarea>
							<div id="radiobts" style="display: flex;">
								<span style="flex-basis: 50%;">
									<input type="radio" id="rb1" name="tipo_ayuda" value="0">
									<label for="rb1">Necesito ayuda</label>
								</span>
								<span style="flex-basis: 50%;">
									<input type="radio" id="rb2" name="tipo_ayuda" value="1">
									<label for="rb2">Quiero ayudar</label>
								</span>
							</div>
							<input type="submit" value="Enviar">
						</form>
					</div>
				</div>
			</section>
		</main>
		<?php include "footer.php" ?>
	</body>
	<script>
		// Cambiar el slider automáticamente cada 4 segundos
		function moveSlider() {
			document.querySelector(".slider-nav-next").click();
			setTimeout(moveSlider, 4000);
		}
		setTimeout(moveSlider, 4000);

		// Mostrar la etiqueta de las entradas en los formularios
		let form_elements = Array.from(document.forms[0].elements);
		for (let input of form_elements) {
			input.oninput = ()=> {
				let label = document.querySelector("#" + input.id + "-l");
				label.style.color = (input.value == "")?"white":"black";
			};
		}
	</script>
</hmtl>