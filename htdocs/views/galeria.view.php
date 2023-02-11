<!DOCTYPE html>
<html lang="es-PE">

<head>
	<?php require('partials/head.php'); ?>
	<title>Agustina y la Osa Mayor | Galería</title>
	<link rel="stylesheet" href="../styles/layout.css">
	<link rel="stylesheet" href="../styles/star_sizes.css">
	<link rel="stylesheet" href="../styles/header.css">
	<link rel="stylesheet" href="../styles/blog.css">
</head>

<body>
	<?php require('partials/header.php'); ?>
	<div id="btn-holder">
		<a class="b_button" id="b_sel" href="/galeria#btn-holder">Galería</a>
		<a class="b_button" href="/blog#btn-holder">Articulos</a>
	</div>
	<div class="gallery">
		<?php
		$files = glob("gallery/*.*");
		for ($i = 0; $i < count($files); $i++) {
			$image = $files[$i];
			echo '<img src="' . $image . '" alt="Imagen" />' . "<br><br>";
		}
		?>
	</div>
	<?php require('partials/footer.php'); ?>
</body>

</html>