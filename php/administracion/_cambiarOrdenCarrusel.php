<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();
conexion();

$idComunicado=$_POST["idComunicado"];
$orden=$_POST["orden"];
mysql_query("CALL cambiarOrdenCarrusel(".$idComunicado.", ".$orden.");") or die("error al invocar al SP. Detalles del error: ".mysql_error());
?>