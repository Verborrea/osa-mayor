<!DOCTYPE html>
<hmtl lang="es-PE">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Agustina y la Osa Mayor | Galería</title>
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
				<a class="b_button" id="b_sel" href="/galeria">Galería</a>
				<a class="b_button" href="/blog">Articulos</a>
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
		<?php include "footer.php" ?>
	</body>
</hmtl>