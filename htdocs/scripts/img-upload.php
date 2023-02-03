<?php

$total = count($_FILES["imagenes"]["name"]);
$descrip = $_POST["descripcion"];
echo $total . "<br>";
for( $i=0 ; $i < $total ; $i++ ) {
	$tmpFilePath = $_FILES["imagenes"]["tmp_name"][$i];
	if ($tmpFilePath != ""){

		$newFilePath = "gallery/" . basename($_FILES["imagenes"]["name"][$i]);

		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($newFilePath,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["imagenes"]["tmp_name"][$i]);
			if($check == false) {
				$uploadOk = 0;
			}
		}

		// Check if file already exists
		if (file_exists($newFilePath)) {
			echo "El archivo ya existe.<br>";
			$uploadOk = 0;
		}	

		// Check file size
		if ($_FILES["imagenes"]["size"][$i] > 5000000) {
			echo "Archivo muy grande.<br>";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Solo se permiten archivos de tipo JPG, JPEG, PNG o GIF.<br>";
			$uploadOk = 0;
		}

		// Check filenaame size (>= 100 chars)
		if(strlen($newFilePath) > 108) {
				echo "Nombre de archivo muy grande.<br>";
				$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			echo "Hubo un error, el archivo no se subió.<br>";
		} else {
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "epiz_33068761_agustina_db";

			$connection = mysqli_connect($servername, $username, $password, $dbname);

			if($connection == false) {
				die("Error: " . mysqli_error_connect());
			}  
		   
			$imgname = basename( $_FILES["imagenes"]["name"][$i]);
		   
			$sql = "INSERT INTO `galeria` (`nombre`, `descripcion`)  VALUES ('$imgname', '$descrip');";
		   
			mysqli_query($connection, $sql) or die(mysqli_error($connection));
			move_uploaded_file($tmpFilePath, $newFilePath);
			mysqli_close($connection);
		}
	}
}
header("Location: " . "/admin/galeria");
die();
?>