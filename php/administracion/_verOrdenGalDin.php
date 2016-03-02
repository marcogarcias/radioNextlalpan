<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();

$num=$_GET["res"];
$idComunic=$_GET["idComunicado"];
if($num<5){ 
$posicion;
$posicionesDisp=5; // numeros de posiciones disponibles
$posicionesOcup; // numeros de posiciones desocupadas
$filaLabels="";
$filaRadios="";

$ordenDisponibles=array(0=>1,1=>2,2=>3,3=>4,4=>5);
// se obtiene el array de la consulta mysql
$ordenOcupados=obtenerNumerosOrden();
$posicionesOcup=mysql_num_rows($ordenOcupados);
$posicionesDisp=$posicionesDisp - $posicionesOcup;

while($fila=mysql_fetch_array($ordenOcupados)){
	if($fila[0]==1){
		$ordenDisponibles[0]=0;
	}
	elseif($fila[0]==2){
		$ordenDisponibles[1]=0;
	}
	elseif($fila[0]==3){
		$ordenDisponibles[2]=0;
	}
	elseif($fila[0]==4){
		$ordenDisponibles[3]=0;
	} 
	elseif($fila[0]==5){
		$ordenDisponibles[4]=0;
	} 
}

for($i=0; $i<$posicionesDisp; $i++){ 
	for($j=0; $j<count($ordenDisponibles); $j++){
		if($ordenDisponibles[$j]!=0){
			$posicion=$ordenDisponibles[$j];
			$ordenDisponibles[$j]=0;
			break;
		}
	}
	$filaLabels=$filaLabels."<th><label for='".$posicion."'>".$posicion."</label></th>";
	$filaRadios=$filaRadios."<td><input type='radio' name='orden' value='".$posicion."' id='".$posicion."' /></td>";
}
?>
	<form>
		<p>Selecciona la posici&oacute;n que quieres que este comunicado aparesca en el carrusel. Las posiciones disponibles actualmente son:</p>
		<table border="1" class="ordenCarruselTabla"><tr> <?php
		echo $filaLabels;
		?>
		</tr> 
		<tr> <?php
		echo $filaRadios;
		?>
		</tr></table>
<?php	
}
else{
	echo "<h3>Atenci&oacute;n. Actualmente ya hay 5 comunicados agregados al carrusel. No se pueden agregar mas de 5 comunicados. Deselecciona de la columna \"Carrusel\" uno o mas comunicados para poder agregar otros.</h3>";
}
	?>
	<div>
		<input type="button" value="A c e p t a r" class="boton01" onclick="cambiarOrdenCarrusel(<?php echo $idComunic; ?>, this.value);" />
		
		<input type="button" value="C e r r a r" class="boton01" onclick="cerrarVentanaModalCarrusel(<?php echo $idComunic; ?>);" />
	</div>
	</form>
	<?php
?>