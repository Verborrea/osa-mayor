<!DOCTYPE html>
<hmtl lang="es-PE">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Agustina y la Osa Mayor | Contacto</title>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="icons/site.webmanifest">
		<link href="styles/layout.css" rel="stylesheet">
		<link href="styles/star_sizes.css" rel="stylesheet">
		<link href="styles/header.css" rel="stylesheet">
		<link href="styles/contacto.css" rel="stylesheet">
	</head>
	<body>
		<?php include "header.php" ?>
		<main>
			<div id="cons-container">
				<div id="contact-image">
					<img src="media/imgs/contacto.jpg">
				</div>
				<div>
					<h1><b>Comunícate</b> con nosotros</h1>
					<p>
						Si deseas comunicarte con nosotros, puedes hacerlo en este formulario o a través de nuestras redes sociales.
					</p>
					<form action="form-contacto.php" method="post">
						<label id="nombre-l">Nombre Completo</label>
						<input id="nombre" name="nombre" type="text" placeholder="Nombre Completo" required>
						<label id="correo-l">Correo Electrónico</label>
						<input id="correo" name="correo" type="email" placeholder="Correo Electrónico" required>
						<label id="msg-l">Mensaje</label>
						<textarea id="msg" name="msg" rows="10" placeholder="Dejanos tu mensaje aquí" required></textarea>
						<input type="submit" value="Enviar Solicitud">
					</form>
				</div>
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
		<?php include "footer.php" ?>
	</body>
	<script>
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