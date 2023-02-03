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

    $img_id = $_POST["imgId"];
    $nueva = $_POST["new_description"];

    $sql = "UPDATE `galeria` SET `descripcion` = '$nueva' WHERE `id` = '$img_id'";
    $conn->query($sql);                   
    
    $conn->close();

    header("Location: " . "/admin/galeria");
    die();
?>