<?php
function base64_to_jpeg( $base64DataString, $output_file ) {
    list($dataType, $imageData) = explode(';', $base64DataString);
    $imageExtension = explode('/', $dataType)[1];
    list(, $encodedImageData) = explode(',', $imageData);
    $decodedImageData = base64_decode($encodedImageData);
    file_put_contents($output_file, $decodedImageData);
}

$myid      = $_POST["post_id"];
$titulo    = $_POST["titulo"];
$categoria = strtoupper($_POST["categoria"]);
$autor     = $_POST["autor"];
$contenido = htmlentities(htmlspecialchars($_POST["contenido"]));
$portada   = "default.png";

// Tratar con las imgs dentro del contenido
if (isset($_POST["base64"])) {
    $base64 = $_POST["base64"];
    $tamanio = count($base64);
    for($i = 0; $i < $tamanio; $i++) {
        $data_array = explode ("*", $base64[$i]); 
        base64_to_jpeg($data_array[1], $data_array[0]);
    }
}
// Tratar con portada subida por el usuario
$tmpFilePath = $_FILES["portada"]["tmp_name"];
if ($tmpFilePath != ""){
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo(basename($_FILES["portada"]["name"]),PATHINFO_EXTENSION));
    $newFilePath = "articles/" . $myid . "-portada." . $imageFileType;

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["portada"]["tmp_name"]);
        if($check == false) {
            $uploadOk = 0;
        }
    }

    if ($_FILES["portada"]["size"] > 5000000) {
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
    }

    if(strlen($newFilePath) > 71) {
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        $portada = $myid . "-portada." . $imageFileType;
        move_uploaded_file($tmpFilePath, $newFilePath);
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "epiz_33068761_agustina_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Error";
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `articulos` (`titulo`, `categoria`, `autor`, `contenido`, `portada`) ".
       "VALUES ('$titulo', '$categoria', '$autor', '$contenido', '$portada');";

$conn->query($sql);
$conn->close();

header("Location: /admin/blog");
die();
?>