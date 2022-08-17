<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();
conexion();

$nombresDeImagenes="";
// procedimiento para seleccionar los nombres de las imagenes a eliminar
// unlink elimina la imagen que se le indica al igual que la ruta
$nombresDeImagenes=mysql_query("CALL nombreImagenesEliminar") or die("error al invocar al SP");
while($nombres=mysql_fetch_array($nombresDeImagenes)){
	unlink("../../img/galeriaDinamica01/".$nombres[0]."");
}
?>