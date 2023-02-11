<!DOCTYPE html>
<html lang="es-PE">
<head>
	<?php require('partials/head.php'); ?>
	<title>Error 404</title>
	<link rel="stylesheet" href="../styles/layout.css">
	<link rel="stylesheet" href="../styles/star_sizes.css">
	<link rel="stylesheet" href="../styles/header.css">
	<link rel="stylesheet" href="../styles/404.css">
</head>
<body>
        <?php require('partials/header.php'); ?>
        <main>
            <div class="container">
                <div class="mant-icon">
                    <img src="../media/tools.png" alt="icono_mantenimiento">
                </div>
                <div class="mant-text">
                    <h1>¡Ups! Algo salió mal...</h1>
                    <h1>Esta página no está disponible por ahora. Vuelve a intentarlo más tarde.</h1>
                </div>
            </div>
            <a href="/"><- Volver al Inicio</a>
        </main>
        <?php require('partials/footer.php'); ?>
</body>
</html>
