<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$fotos = $db->query('select * from galeria')->get();

view("fotos/index.view.php", [
  'fotos' => $fotos,
]);