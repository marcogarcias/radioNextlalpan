<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();
conexion();

$idComunicado=$_POST["idComunicado"];
mysql_query("CALL comprobarEstadoOrden(".$idComunicado.");") or die("error al invocar al SP. Detalles del error: ".mysql_error());
?>