<!DOCTYPE html>
<hmtl>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Agustina y la Osa Mayor | Galería</title>
		<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="fav/site.webmanifest">
		<link href="styles/layout.css" rel="stylesheet">
		<link href="styles/blog.css" rel="stylesheet">
		<link href="styles/star_sizes.css" rel="stylesheet">
		<link href="styles/header.css" rel="stylesheet">
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
            <div style="display: flex;justify-content: center;margin: 1em auto;">
				<a class="b_button" id="b_sel" href="galeria.html">Galeria</a>
				<a class="b_button" href="blog.html">Articulos</a>
			</div>
            <div class="gallery">
            <?php
                $files = glob("gallery/*.*");
                for ($i = 0; $i < count($files); $i++) {
                    $image = $files[$i];
                    echo '<img src="' . $image . '" alt="Imagen" />' . "<br /><br />";
                }
            ?>
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