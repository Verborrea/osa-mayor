<!DOCTYPE html>
<html lang="es-PE">

<head>
	<?php require base_path('views/partials/head.php') ?>
	<title>Agustina y la Osa Mayor | Galería</title>
	<link rel="stylesheet" href="../styles/layout.css">
	<link rel="stylesheet" href="../styles/star_sizes.css">
	<link rel="stylesheet" href="../styles/header.css">
	<link rel="stylesheet" href="../styles/blog.css">
</head>

<body>
	<?php require base_path('views/partials/header.php') ?>
	<div id="btn-holder">
		<a class="b_button" id="b_sel" href="/galeria#btn-holder">Galería</a>
		<a class="b_button" href="/blog#btn-holder">Artículos</a>
	</div>
	<div class="gallery">
		<?php foreach ($imagenes as $imagen): ?>
			<img src="<?= $imagen ?>" alt="Imagen">
		<?php endforeach ?>
	</div>
	<?php require base_path('views/partials/footer.php') ?>
</body>

</html>