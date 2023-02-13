<!DOCTYPE html>
<html lang="es-PE">
<head>
	<?php require base_path('views/partials/head.php') ?>
	<title>Agustina y la Osa Mayor | Blog</title>
	<link rel="stylesheet" href="../styles/layout.css">
	<link rel="stylesheet" href="../styles/star_sizes.css">
	<link rel="stylesheet" href="../styles/header.css">
	<link rel="stylesheet" href="../styles/blog.css">
</head>
<body>
<?php require base_path('views/partials/header.php') ?>
	<main>
		<div id="btn-holder">
			<a class="b_button" href="/galeria#btn-holder">Galería</a>
			<a class="b_button" id="b_sel" href="/blog#btn-holder">Artículos</a>
		</div>
		<div id="more-container">
			<?php foreach ($categorias as $key => $categoria): ?>
			<div class="cat-name"><?= $key ?></div>
				<div class="articulos-container">
				<?php foreach ($categoria as $articulo): ?>
					<a class="otro" href="/articulo?id=<?= $articulo["id"] ?>">
						<img class="thumbnail" src="articles/<?= $articulo["portada"] ?>">
						<div class="otro-info">
							<div class="otro-dat"><?= $articulo["fecha"] ?></div>
							<div class="otro-tit"><?= $articulo["titulo"] ?></div>
							<div class="otro-aut">POR: <?= strtoupper($articulo["autor"]) ?></div>
							<div class="otro-res"><?= $articulo["contenido"] ?></div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</main>
	<?php require base_path('views/partials/footer.php') ?>
</body>
</html>