<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "epiz_33068761_agustina_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "Error";
	die("Connection failed: " . $conn->connect_error);
}

$myid = $_GET["id"];

$sql = "SELECT * FROM articulos WHERE `id` = '$myid'";
$result =  $conn->query($sql);

// Borrar portada e imagenes asociadas.
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		if ($row["portada"] != "default.png") {
			unlink("articles/" . $row["portada"]);
		}
		// borrar imagenes asociadas
		foreach (glob("articles/" . $myid . "-*") as $nombre_fichero) {
			unlink($nombre_fichero);
		}
	}
}

$sql = "DELETE FROM `articulos` WHERE `id` = '$myid'";

$conn->query($sql);

$conn->close();

header("Location: /admin/blog");
die();
?>