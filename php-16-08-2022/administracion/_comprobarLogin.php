<?php session_start(); ?>
<?php 
include("adminLibrerias.php");
$email = $pass = null;
if(isset($_POST["email"])){
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	conexion();
	$res = mysql_query("CALL obtenerUsuarios('".$email."', '".$pass."')") or die("error al invocar al SP");
	if(mysql_num_rows($res)>0){
		while($fila=mysql_fetch_array($res)){
			$_SESSION["idUser"]=$fila[0];
			$_SESSION["nombre"]=$fila[1];
			$_SESSION["ap"]=$fila[2];
			$_SESSION["am"]=$fila[3];
			$_SESSION["email"]=$fila[4];
			$_SESSION["pass"]=$fila[5];
			$_SESSION["nivel"]=$fila[6];
		}
		echo "<script>
		document.location.href='galeriaDinamicaAdmin01.php';
		</script>";
	}
	else{
		echo "<script>
		alert('Usuario/password incorrecto');
				\$('#email').val('');
				\$('#pass').val('');
		</script>";
	}
}
?>