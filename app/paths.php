<?php

$serv = $_SERVER['DOCUMENT_ROOT'].'/dominios/radionextlalpan';
$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';

// path raiz del proyecto
define('PATH', $pathFile);
// nombre del proyecto
//define('PROJECT', 'radioNextlalpan');

// almacena el nombre del dominio
//define('PATH_HOST', $_SERVER['HTTP_HOST'].'/'.PROJECT);

// almacena el path de la carpeta pública desde el dominio [ocalhost/radioNextlalpan/public]
//define('PATH_PUBLIC', $_SERVER['HTTP_HOST'].'/'.PROJECT.'/public');

// almacena el path de la carpeta pública con la ruta del servidor [/var/www/html/radioNextlalpan/public]
//define('PATH_PUBLIC_', $_SERVER['DOCUMENT_ROOT'].'/'.PROJECT.'/public');

// almacena el path de la carpeta de administración desde el dominio [localhost/radioNextlalpan/php/administracion]
//define('PATH_ADMIN', $_SERVER['HTTP_HOST'].'/'.PROJECT.'/php/administracion');

// almacena el path de la carpeta de administración dcon la ruta del servidor [/var/www/html/radioNextlalpan/php/administracion]
//define('PATH_ADMIN_', $_SERVER['DOCUMENT_ROOT'].'/'.PROJECT.'/php/administracion');
?>