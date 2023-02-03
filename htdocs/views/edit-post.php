<!DOCTYPE html>
<hmtl>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Website Manager</title>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="icons/site.webmanifest">
		<link href="../styles/layout.css" rel="stylesheet">
		<link href="../styles/header.css" rel="stylesheet">
		<link href="../styles/add.css" rel="stylesheet">
		<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
		<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	</head>

	<body>
		<header>
			<div id="logo">
				<img src="../media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
                <div id="admin-header">
					<a href="/admin?tipo=ayuda">Ayuda</a>
					<a href="/admin?tipo=voluntariado">Voluntariado</a>
					<a href="/admin?tipo=contacto">Contacto</a>
					<a href="/admin/blog" class="active">Editar entradas</a>
					<a href="/admin/galeria">Galería</a>
				</div>
			</div>
		</header>
		<main>
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

        $portada = "default.png";

        if(isset($_GET['id'])) {

            $myid = $_GET['id'];

            $sql = "SELECT * FROM articulos WHERE id = $myid";
            $result = $conn->query($sql);                   
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $autor = $row["autor"];
                    $titulo = $row["titulo"];
                    $contenido = html_entity_decode(htmlspecialchars_decode($row["contenido"]));
                    $categoria = $row["categoria"];
                    $portada = $row["portada"];
                    echo '<form action="post-update.php" method="post" enctype="multipart/form-data">
                            <input id="post_id" name="post_id" type="hidden" value="'.$myid.'">
                            <div class="blok_input">
                                <label for="titulo">Título del artículo:</label>
                                <input type="text" id="titulo" name="titulo" maxlength="75" value = "' . $titulo . '" required>
                            </div>
                            <div class="blok_input">
                                <label for="categoria">Categoría:</label>
                                <input type="text" id="categoria" name="categoria" maxlength="25" value = "' . $categoria . '" required>
                            </div>
                            <div class="blok_input">
                                <label for="categoria">Autor:</label>
                                <input type="text" id="autor" name="autor" maxlength="30"value = "' . $autor . '"  required>
                            </div>
                            <div class="blok_input">
                                <label for="contenido">Cuerpo:</label>
                                <input name="contenido" type="hidden">
                                <div id="editor">
                                    '.$contenido.'
                                </div>
                            </div>
                            <div class="bts">
                                <a href="javascript:history.back()" class="btn">Regresar</a>
                                <input type="submit" id="submit" class="btn" value="Guardar">
                            </div>
                        </form>';
                }
            }
        }
        else {
            $sql = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'epiz_33068761_agustina_db' AND TABLE_NAME = 'articulos';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $myid = $row["AUTO_INCREMENT"];
                }
            }
            echo '<form action="post-upload.php" method="post" enctype="multipart/form-data">
                <input id="post_id" name="post_id" type="hidden" value="'.$myid.'">
				<div class="blok_input">
					<label for="titulo">Título del artículo:</label>
					<input type="text" id="titulo" name="titulo" maxlength="75"
                     required>
				</div>
				<div class="blok_input">
					<label for="categoria">Categoría:</label>
					<input type="text" id="categoria" name="categoria" maxlength="25" required>
				</div>
				<div class="blok_input">
					<label for="categoria">Autor:</label>
					<input type="text" id="autor" name="autor" maxlength="30" required>
				</div>
                <div class="blok_input">
                    <label for="contenido">Cuerpo:</label>
                    <input name="contenido" type="hidden">
                    <div id="editor"></div>
                </div>
                <div class="blok_input">
					<label for="portada">Imagen de portada:</label>
					<input type="file" id="portada" name="portada">
				</div>
                <div class="bts">
                    <a href="javascript:history.back()" class="btn">Regresar</a>
					<input type="submit" id="submit" class="btn" value="Añadir">
				</div>
			</form>';
        }

        $conn->close();
        ?>
		<script>
            //text editor code
            var quill = new Quill('#editor', {
                modules: {
                    toolbar: [
                        ['bold', 'italic'],
                        ['link', 'blockquote', 'code-block', 'image'],
                        [{ list: 'ordered' }, { list: 'bullet' }]
                    ]
                },
                placeholder: 'Compose an epic...',
                theme: 'snow'
            });      

            var form = document.querySelector('form');

            form.onsubmit = function() {
                var contenido = document.querySelector('input[name=contenido]');

                const element = document.getElementById("editor").firstChild;
                const imagenes = element.getElementsByTagName("img");
                const articulo_id = document.getElementById("post_id").value;
                Array.from(imagenes).forEach(function (imagen) {
                    // CASO: nueva img desde base64
                    if (imagen.src.substring(0, 4) == "data") {
                        let base64 = imagen.src;
                        let extension = base64.slice(11, 20);
                        extension = "." + extension.slice(0, extension.search(";"));
                        let new_path = "articles/" +  parseInt(articulo_id) + "-" + Math.random().toString(16).slice(2) + extension;
                        imagen.src = "../" + new_path;

                        // add to form as text array input
                        let base64field = document.createElement("input");
                        base64field.setAttribute('type', 'text');
                        base64field.setAttribute('name', 'base64[]');
                        base64field.setAttribute('value', new_path + "*" + base64);
                        form.appendChild(base64field);

                    // CASO: img almacenada en server
                    } else if (imagen.src.substring(3, 12) == "articles"){
                        let filename = imagen.src.substring(3) ;
                        // se deben enviar para ver si alguna se eliminó
                        let oldimages = document.createElement("input");
                        oldimages.setAttribute('type', 'text');
                        oldimages.setAttribute('name', 'oldimgs[]');
                        oldimages.setAttribute('value', filename);
                        form.appendChild(oldimages);
                    }
                });

                contenido.value = element.innerHTML; 
                return true;
            };
            
            function loadURLToInputFiled(url){
                getImgURL(url, (imgBlob)=>{
                    // Load img blob to input
                    // WIP: UTF8 character error
                    const articulo_id = document.getElementById("post_id").value;
                    let fileName = articulo_id + '-portada.jpg'
                    let file = new File([imgBlob], fileName,{type:"image/jpeg", lastModified:new Date().getTime()}, 'utf-8');
                    let container = new DataTransfer(); 
                    container.items.add(file);
                    document.querySelector('#portada').files = container.files;
                    
                })
            }
            // xmlHTTP return blob respond
            function getImgURL(url, callback){
                var xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    callback(xhr.response);
                };
                xhr.open('GET', url);
                xhr.responseType = 'blob';
                xhr.send();
            }

            <?php
                // if(isset($_GET['id'])) {
                //     $portada_url = 'http://agustinaylaosamayor.rf.gd/articulos/default.png';
                //     if ($portada != "default.png") {
                //         $portada_url =  'http://agustinaylaosamayor.rf.gd/articulos/'.$myid.'-portada.jpg';
                //         echo 'loadURLToInputFiled("'.$portada_url.'")';
                //     }
                // }
            ?>
        </script>
		</main>
		<?php include "footer.php" ?>
	</body>
</hmtl>