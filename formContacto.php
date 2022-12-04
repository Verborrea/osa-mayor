<!DOCTYPE html>
<hmtl>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Agustina y la Osa Mayor | Contacto</title>
		<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="fav/site.webmanifest">
		<link href="styles/layout.css" rel="stylesheet">
		<link href="styles/contacto.css" rel="stylesheet">
		<link href="styles/star_sizes.css" rel="stylesheet">
		<link href="styles/header.css" rel="stylesheet">
		<script type="text/javascript" src="scripts/myform.js"></script>
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
						<a href="index.html">Inicio</a>
					</div>
					<div class="star" id="star2">
						<a href="nosotros.html">Nosotros</a>
					</div>
					<div class="star" id="star3">
						<a href="voluntariado.html">Volun<br>tari<br>ado</a>
					</div>
					<div class="star" id="star4">
						<a href="prox.html">Donacio<br>nes</a>
					</div>
					<div class="star" id="star5">
						<a href="contacto.html">Con<br>tac<br>to</a>
					</div>
					<div class="star" id="star6">
						<a href="blog.html">Blog</a>
					</div>
					<div class="star" id="star7">
						<a href="prox.html">Tienda</a>
					</div>
				</div>
				<div id="container_gif2"><img id="gif2" img src="media/gif2.gif"></div>
			</div>
		</header>
		<main>
			<div id="cons-container">
				<div id="contact-image">
					<img src="media/imgs/contacto.jpg">
				</div>
				<div>
						<h1>¡Gracias por comunicarte!</h1>
						<p>Tu mensaje se ha enviado correctamente</p>
				</div>
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
						$name = $_POST["name"];
						$correo = $_POST["correo"];
						$msg = $_POST["msg"];
						$sql = "INSERT INTO contacto (nombre,email,mensaje) VALUES ('$name','$correo','$msg')";

						$conn->query($sql);
						$conn->close();
				?>
			</div>
			<section id="contacto">
				<h1>Contacto y <b>Redes</b> Sociales</h1>
				<div id="datos">
					<a href="tel:940185837">
						<div class="dato">
							<span><img src="media/svg/phone.svg" width="50px"></span>
							<div>966 362 447</div>
						</div>
					</a>
					<a href="mailto:angelasamame@gmail.com">
						<div class="dato">
							<span><img src="media/svg/email.svg" width="50px"></span>
							<div>angelasamame@gmail.com</div>
						</div>
					</a>
					<a href="https://www.instagram.com/agustinaylaosamayor" target="_blank">
						<div class="dato">
							<span><img src="media/svg/insta.svg" width="50px"></span>
							<div>@agustinaylaosamayor</div>
						</div>
					</a>
					<a href="https://fb.com/agustinaylaosamayor" target="_blank">
						<div class="dato">
							<span><img src="media/svg/fb.svg" width="50px"></span>
							<div>Agustina y la Osa Mayor</div>
						</div>
					</a>
					<a href="https://www.youtube.com/channel/UC5gVn5qG1ZIVy-9mxkg0w7Q" target="_blank">
						<div class="dato">
							<span><img src="media/svg/yt.svg" width="50px"></span>
							<div>Agustina y La Osa Mayor</div>
						</div>
					</a>
				</div>
			</section>
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