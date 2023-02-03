<!DOCTYPE html>
<hmtl lang="es-PE">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Website Manager</title>
		<link rel="apple-touch-icon" sizes="180x180" href="../fav/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../fav/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico?">
		<link rel="manifest" href="../fav/site.webmanifest">
		<link href="../styles/layout.css" rel="stylesheet">
		<link href="../styles/header.css" rel="stylesheet">
		<link href="../styles/forms.css" rel="stylesheet">
		<link href="../styles/upload.css" rel="stylesheet">
	</head>

	<body>
		<header>
			<div id="logo">
				<a href="/">
                    <img src="../media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
                </a>
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
				<div id="admin-header">
					<a href="/admin?tipo=ayuda">Ayuda</a>
					<a href="/admin?tipo=voluntariado">Voluntariado</a>
					<a href="/admin?tipo=contacto">Contacto</a>
					<a href="/admin/blog">Editar entradas</a>
					<a href="/admin/galeria" class="active">Galería</a>
				</div>
			</div>
		</header>
		<main>
			<div id="drop-area">
				<form class="my-form" action="img-upload.php" method="post" enctype="multipart/form-data">
					<p>Arrastre una imagen o use el botón de Seleccionar Archivo.</p>
					<input type="text" id="descripcion" name="descripcion" maxlength="130" placeholder="Descripción.">
					<input type="file" id="imagenes" name="imagenes[]" multiple accept="image/*" onchange="handleFiles(this.files)" style="opacity:0%">
					<label class="button" for="imagenes">Seleccionar Archivo</label>
					<input type="submit" value="Subir">
				</form>
				<div id="gallery"></div>
			</div>
			<div id="images">
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "epiz_33068761_agustina_db";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					echo "Error";
				die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT nombre,descripcion FROM galeria";
				$result = $conn->query($sql);                   
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					    echo '<div class="imgbox">'.
                        '<div class="picbox"><img src="../gallery/' . $row["nombre"] . '"></div>'.
                        '<div class="description">' . $row["descripcion"] . '</div>'.
                        '<div class="icon-box">'.
                        '<a class="icon" href="/admin/edit-img?name='. $row["nombre"] .'">Editar</a>'.
                        '<a class="icon" href="/admin/delete-img?name='. $row["nombre"] .'">Borrar</a>'.
                        '</div></div>';
					}
				}
				$conn->close();
			?>
			</div>
		</main>
		<?php include "footer.php" ?>
	</body>
</hmtl>
<script>
	// ************************ Drag and drop ***************** //
	let dropArea = document.getElementById("drop-area")

		// Prevent default drag behaviors
		;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
			dropArea.addEventListener(eventName, preventDefaults, false)
			document.body.addEventListener(eventName, preventDefaults, false)
		})

		// Highlight drop area when item is dragged over it
		;['dragenter', 'dragover'].forEach(eventName => {
			dropArea.addEventListener(eventName, highlight, false)
		})

		;['dragleave', 'drop'].forEach(eventName => {
			dropArea.addEventListener(eventName, unhighlight, false)
		})

	// Handle dropped files
	dropArea.addEventListener('drop', handleDrop, false);

	function preventDefaults(e) {
		e.preventDefault();
		e.stopPropagation();
	}

	function highlight(e) {
		dropArea.classList.add('highlight');
	}

	function unhighlight(e) {
		dropArea.classList.remove('active');
	}

	function handleDrop(e) {
		var dt = e.dataTransfer;
		var files = dt.files;
		handleFiles(files);
	}

	function handleFiles(files) {
		files = [...files];
		files.forEach(previewFile);
	}

	function previewFile(file) {
		let reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onloadend = function () {
			let img = document.createElement('img');
			img.src = reader.result;
			document.getElementById('gallery').appendChild(img);
		}
	}
</script>