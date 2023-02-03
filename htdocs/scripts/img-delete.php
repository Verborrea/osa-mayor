<?php
    $imgname = $_GET["name"];
    $path = "gallery/" . $imgname;
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "epiz_33068761_agustina_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "Error";
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM `galeria` WHERE `nombre` = '$imgname'";
    $conn->query($sql);                   
    
    $conn->close();

    if (!unlink($path)) {
        echo "No se pudo eliminar el archivo";
    }

    header("Location: " . "/admin/galeria");
    die();
?>