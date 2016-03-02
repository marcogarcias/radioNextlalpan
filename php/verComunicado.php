<?php
include("librerias.php");
conexion();
$idCom=$_GET["idCom"];
$datosComunicado=obtenerDatosComunicado($idCom);
?>
<div class="datosComunicado">
<?php
if(mysql_num_rows($datosComunicado)>0){
	while($fila=mysql_fetch_array($datosComunicado)){ ?>
		<table border="0">
			<tr><td rowspan="6" valign="top">
				<img src="img/galeriaDinamica01/<?php echo $fila[1]; ?>" width="180" height="200" alt="" />
			</td></tr>
			<tr><td>
				<h1><?php echo $fila[2]; ?></h1>
			</td></tr>
			<tr><td>
				<hr />
			</td></tr>
			<tr><td>
				<p class="datosComunicadoDescriop01">
					<?php echo $fila[3]; ?>
				</p>
			</td></tr>
			<tr><td>
				<p class="datosComunicadoDescriop02">
					<?php echo $fila[4]; ?>
				</p>
			</td></tr>
			<tr><td>
				<p class="datosComunicadoBoton">
					<input type="button" value="C e r r a r" class="boton01" onclick="cerrarVentanaModal();" />
				</p>
			</td></tr>
		</table>
	<?php
	}
}
else{ ?>
	<label>Comunicado no disponible.</label>
	<hr />
	<p>
		<input type="button" value="C e r r a r" class="boton01" onclick="cerrarVentanaModal();" />
	</p>
<?php
}
?>
</div>