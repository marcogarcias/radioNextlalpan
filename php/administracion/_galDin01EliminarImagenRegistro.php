<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();
conexion();

// procedimiento que elimina los articulos seleccionados de la base de datos (los que tienen el atributo "seleccionado" con valor de "1")
mysql_query("CALL galDin01EliminarImagen();") or die("error al invocar al SP");
?>