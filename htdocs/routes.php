<?php

require_once __DIR__.'/router.php';

// Vistas - Usuario =======================================

get('/', 'views/index.php');
get('/nosotros', 'views/nosotros.php');
get('/voluntariado', 'views/voluntariado.php');
get('/contacto', 'views/contacto.php');
get('/galeria', 'views/galeria.php');
get('/blog', 'views/blog.php');
get('/articulos/$id', 'views/articulo.php');
get('/privacidad', 'views/privacidad.php');
get('/terminos-y-condiciones', 'views/terminos.php');
get('/gracias/$nombre', 'views/gracias.php');

// PHP scripts

post('/form-ayuda.php', 'scripts/form-ayuda.php');
post('/form-voluntarios.php', 'scripts/form-voluntarios.php');
post('/form-contacto.php', 'scripts/form-contacto.php');

// Vistas - Admin. ========================================

get('/admin', 'views/admin.php');
get('/admin/galeria', 'views/admin-galeria.php');
get('/admin/blog', 'views/admin-blog.php');
get('/admin/edit-img', 'views/edit-img.php');
get('/admin/mensaje', 'views/mensaje.php');
get('/admin/edit-post', 'views/edit-post.php');

// PHP scripts

post('/admin/img-upload.php', 'scripts/img-upload.php');
post('/admin/change-desc.php', 'scripts/change-desc.php');
get('/admin/delete-img', 'scripts/img-delete.php');
get('/admin/delete-form', 'scripts/form-delete.php');
get('/admin/delete-post', 'scripts/post-delete.php');
post('/admin/post-update.php', 'scripts/post-update.php');
post('/admin/post-upload.php', 'scripts/post-upload.php');

// Any

any('/404','views/404.php');
