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
$id = $_GET["id"];
$tipo = $_GET["tipo"];

$sql = "DELETE FROM `$tipo` WHERE `$tipo`.`id` = $id";
$conn->query($sql);
$conn->close();

header("Location: /admin?tipo=$tipo&exito=e");
die();
?>