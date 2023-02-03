<?php

function base64_to_jpeg( $base64DataString, $output_file ) {
    list($dataType, $imageData) = explode(';', $base64DataString);
    list(, $encodedImageData) = explode(',', $imageData);
    $decodedImageData = base64_decode($encodedImageData);
    file_put_contents($output_file, $decodedImageData);
}

$myid      = $_POST["post_id"];
$titulo    = $_POST["titulo"];
$categoria = strtoupper($_POST["categoria"]);
$autor     = $_POST["autor"];
$contenido = htmlentities(htmlspecialchars($_POST["contenido"]));

// Borrar imagenes ya no usadas de la carpeta articulos.
if (isset($_POST["oldimgs"])) {
    $oldimgs = $_POST["oldimgs"];
    foreach (glob("articles/".$myid."-*") as $nombre_img) {
        if (!(in_array($nombre_img, $oldimgs))) {
            unlink($nombre_img);
        }
    }
}

// Tratar con las imgs dentro del contenido
if (isset($_POST["base64"])) {
    $base64 = $_POST["base64"];
    $tamanio = count($base64);
    for ($i = 0; $i < $tamanio; $i++) {
        $data_array = explode("*", $base64[$i]);
        $f = fopen($data_array[0], 'wb');
        stream_filter_append($f, 'convert.base64-decode');
        fwrite($f, substr($data_array[1], strpos($data_array[1], ',') + 1));
        fclose($f);
    }
}

// Conexión y UPDATE QUERY
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "epiz_33068761_agustina_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Error";
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE articulos SET titulo='$titulo',categoria='$categoria',autor='$autor',contenido='$contenido' WHERE id=$myid";

$conn->query($sql);
move_uploaded_file($tmpFilePath, $newFilePath);
$conn->close();

header("Location: /admin/blog");
die();
?>