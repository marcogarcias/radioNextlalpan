<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();
head();
conexion();

$idComunicado=$_POST["idComunicado"];
mysql_query("CALL elegirFila(".$idComunicado.");") or die("error al invocar al SP");
?>