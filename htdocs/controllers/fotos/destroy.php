<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$db->query('delete from galeria where id = :id', [
    'id' => $_POST['id']
]);

header('location: /admin/fotos');
exit();