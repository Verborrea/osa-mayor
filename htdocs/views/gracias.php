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
		<link href="../styles/layout.css" rel="stylesheet">
		<link href="../styles/star_sizes.css" rel="stylesheet">
		<link href="../styles/header.css" rel="stylesheet">
		<link href="../styles/contacto.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div id="logo">
				<img src="../media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
				<div id="container_gif1"><img id="gif1" src="../media/gif1.gif"></div>
				<div id="ursa">
					<img id="star_path" src="../media/camino.png">
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
				<div id="container_gif2"><img id="gif2" img src="../media/gif2.gif"></div>
			</div>
		</header>
		<main>
			<div id="cons-container">
				<div id="contact-image">
					<img src="../media/imgs/osito.jpg">
				</div>
				<div>
					<h1><b>Hola</b> <?php echo urldecode($nombre);?></h1>
					<p>
						Gracias por comunicarte con nosotros. Nos pondremos en contacto contigo lo más pronto posible.
					</p>
                    <a href="/">Regresar a Inicio</a>
				</div>
			</div>
			<section id="contacto">
				<h1>Contacto y <b>Redes</b> Sociales</h1>
				<div id="datos">
					<a href="tel:940185837">
						<div class="dato">
							<span><img src="../media/svg/phone.svg" width="50px"></span>
							<div>966 362 447</div>
						</div>
					</a>
					<a href="mailto:angelasamame@gmail.com">
						<div class="dato">
							<span><img src="../media/svg/email.svg" width="50px"></span>
							<div>angelasamame@gmail.com</div>
						</div>
					</a>
					<a href="https://www.instagram.com/agustinaylaosamayor" target="_blank">
						<div class="dato">
							<span><img src="../media/svg/insta.svg" width="50px"></span>
							<div>@agustinaylaosamayor</div>
						</div>
					</a>
					<a href="https://fb.com/agustinaylaosamayor" target="_blank">
						<div class="dato">
							<span><img src="../media/svg/fb.svg" width="50px"></span>
							<div>Agustina y la Osa Mayor</div>
						</div>
					</a>
					<a href="https://www.youtube.com/channel/UC5gVn5qG1ZIVy-9mxkg0w7Q" target="_blank">
						<div class="dato">
							<span><img src="../media/svg/yt.svg" width="50px"></span>
							<div>Agustina y La Osa Mayor</div>
						</div>
					</a>
				</div>
			</section>
		</main>
		<?php include "footer.php" ?>
	</body>
</hmtl>