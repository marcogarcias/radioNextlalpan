<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();
conexion();

$idComunicado=$_POST["idComunicado"];
$res=mysql_query("CALL elegirCarrusel(".$idComunicado.");") or die("error al invocar al SP");
while($fila=mysql_fetch_array($res)){
	echo $fila[0];
}
?>