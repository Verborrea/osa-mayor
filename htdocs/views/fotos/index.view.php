<!DOCTYPE html>
<html lang="es-PE">

<head>
	<?php require base_path('views/partials/head.php') ?>
	<title>Agustina y la Osa Mayor</title>
	<link rel="stylesheet" href="../styles/layout.css">
	<link rel="stylesheet" href="../styles/admin/layout.css">
	<link rel="stylesheet" href="../styles/admin/fotos.css">
</head>

<body>
	<?php require base_path('views/partials/admin-header.php') ?>
	<main>
		<section id="fotos">
		<?php foreach ($fotos as $foto): ?>
			<article class="foto">
				<img src="../gallery/<?= $foto['nombre'] ?>" alt="<?= $foto['descripcion'] ?>"
						 title="<?= $foto['descripcion'] ?>" height="300px">
				<div class="foto-description"><?= $foto['descripcion'] ?></div>
				<div class="btns">
					<button>Editar</button>
					<form action="" method="post">
						<button>Borrar</button>
					</form>
				</div>
			</article>
		<?php endforeach; ?>
		</section>
  </main>
  <?php require base_path('views/partials/footer.php') ?>
</body>

</html>