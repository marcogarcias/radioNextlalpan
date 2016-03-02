<?php
/*
variables de sesion:
$_SESSION["idUser"];
$_SESSION["nombre"];
$_SESSION["ap"];
$_SESSION["am"];
$_SESSION["nick"];
$_SESSION["pass"];
$_SESSION["nivel"];
*/
/*
function conexion(){
	//mysql_connect("10.33.143.24", "axapusco_root", "rootPax4pusc0", false, 65536);
	mysql_connect("localhost", "axapusco_root", "rootPax4pusc0", false, 65536);
	mysql_select_db("axapusco_axapusco") or die("Error al intentar conectar a la base de datos");
}
*/
/*
function comprobarSesion(){
	if(!isset($_SESSION["idUser"])){
		echo "<script>location.href='login.php'</script>";
	}
}
*/
function head(){ ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>SECCION DE ADMINISTRADOR</title>
		<link href="../../public/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<!-- <link href="../../css/galDinAdmin01.css" rel="stylesheet" /> -->
		<link href="../../public/css/adm.css" rel="stylesheet" />
		<link rel="shortcut.icon" href="img/varios/logoRadioIcono01.ico" type="image/x-icon" />
		<script src="../../public/js/jquery-1.12.0.js"></script>
		<script src="../../public/libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../public/js/Form.js"></script>
		<script src="../../public/js/adm.js"></script>
	</head>
<?php
}

function separador(){ ?>
	<div class="separador"><span>Usuario: <?php echo $_SESSION["email"]; ?></span><span onclick="cerrarSesion();">Logout</span></div>
<?php
}

function cerrarSesion(){
	$_SESSION = array();
	session_destroy();
}

function insertarArticuloGaleriaDinamica($titImg, $desMiniImg, $desFullImg, $nombre){
	conexion();
	mysql_query("CALL insertarArticuloGaleriaDinamica('".$titImg."', '".$desMiniImg."', '".$desFullImg."', '".$nombre."')") or die("error al invocar al SP");
}

function obtenerArticuloPorId($idComunicado){
	conexion();
	$articulo=mysql_query("CALL obtenerArticuloPorId('".$idComunicado."')") or die("error al invocar al SP");
	return $articulo;
}

function galDin01ModificarImagenRegistro($idImg, $nombre, $titImg, $desMiniImg, $desFullImg){
	conexion();
	mysql_query("CALL galDin01ModificarImagenRegistro('".$idImg."', '".$nombre."', '".$titImg."', '".$desMiniImg."', '".$desFullImg."');") or die("error al invocar al SP");
}

function obtenerNumerosOrden(){
	conexion();
	$ordenOcupados;
	$ordenOcupados=mysql_query("CALL obtenerNumerosOrden();") or die("error al invocar al SP. Detalles del error: ".mysql_error());
	return $ordenOcupados;
}
?>