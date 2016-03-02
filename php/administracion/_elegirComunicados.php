<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();
conexion();

$idComunicado=$_POST["idComunicado"];
mysql_query("CALL elegirComunicados(".$idComunicado.");") or die("error al invocar al SP");
?>