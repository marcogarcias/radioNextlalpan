<?php session_start(); ?>
﻿<?php
require_once '../../app/controller/login/LoginCtrl.php';
include("adminLibrerias.php");
var_dump('okok');
die();
//comprobarSesion();
$loginCtrl = new LoginCtrl();
$loginCtrl->checkSession();
head();
conexion();
$res=mysql_query("CALL galeriaDinamicaTotal()");
?>
<body>
<div id="contenedor">
	<div id="cabecera"></div>
	<div id="contenedorAdmin">
		<div id="contAdminCabecera">
			<h2>ADMINISTRADOR DE GALERIA DINAMICA 01</h2>
			<input type="button" value="AGREGAR IMAGEN" class="botonAdmin" onclick="galDin01AgregarImagen();" />
			<input type="button" value="ELIMINAR IMAGEN" class="botonAdmin" onclick="galDin01EliminarImagen();" />
		</div>
		<?php separador(); ?>
		<table border="0" cellpadding="1" cellspacing="3" id="contAdminArchivos">
			<tr>
				<th>Elegir</th>
				<th>Imagen</th>
				<th>nombre img</th>
				<th>T&iacute;tulo</th>
				<th>Descripci&oacute;n01</th>
				<th>Descripci&oacute;n02</th>
				<th>Carrusel</th>
				<th>Comunicados</th>
				<th>URL</th>
				<th>Modificar</th>
			</tr>
				
			<?php
			if(mysql_num_rows($res)>0){
				$rowClase01=$check=$checkCarrusel="";
				while($fila=mysql_fetch_array($res)){
					if($fila[10]==1){
						$rowClase01="rowActivo";
						$check="checked";
					}
					else{
						$rowClase01="rowInactivo";
						$check="";
					} 
					
					// if para checar si el campo "visibleCarrusel" esta en true/activado/1 o false/desactivado/0 
					if($fila[5]==1){
						$checkCarrusel="checked";
					}
					else{
						$checkCarrusel="";
					}

					// if para checar si el campo "visibleArticulo" esta en true/activado/1 o false/desactivado/0 
					if($fila[6]==1){
						$checkArticulo="checked";
					}
					else{
						$checkArticulo="";
					} ?>
				<tr valign='top' class="<?php echo $rowClase01; ?>" id="fila<?php echo $fila[0]; ?>">
					<td class="centrar"><input type="checkbox" name="elegido" id="check<?php echo $fila[0]; ?>" onclick="elegirFila(<?php echo $fila[0]; ?>)" <?php echo $check; ?> /></td>
					<td><img src="../../img/galeriaDinamica01/<?php echo $fila[1]; ?>" width="80" height="80" alt="<?php echo $fila[2]; ?>" title="<?php echo $fila[2]; ?>" /></td>
					<td><?php echo $fila[1]; ?></td>
					<td><?php echo $fila[2]; ?></td>
					<td><?php echo $fila[3]; ?></td>
					<td><?php echo $fila[4]; ?></td>
					<td class="centrar"><input type="checkbox" id="checkCarrusel<?php echo $fila[0]; ?>" onclick="elegirCarrusel(<?php echo $fila[0]; ?>)" <?php echo $checkCarrusel; ?> /><p><?php echo $fila[11]; ?></p></td>
					<td class="centrar"><input type="checkbox" id="checkComunicados<?php echo $fila[0]; ?>" onclick="elegirComunicados(<?php echo $fila[0]; ?>)" <?php echo $checkArticulo; ?> /></td>
					<td><?php echo $fila[9]; ?></td>
					<td><input type="button" value="MODIFICAR" class="botonAdmin02" onclick="galDin01ModificarImagen(<?php echo $fila[0]; ?>);" /></td>
				</tr>
			<?php
				} // cierre del while
			}
			else{
				echo "<td colspan='7' align='center'><h2>Sin imagenes</h2></td>";
			} // cierre del if ?>
			</tr>
		</table>
		<!-- VENTANA MODAL -->
		<div id="modalDark" class="modalFondo">
			<div id="modalLight" class="modalBlanco">
				<!-- <div id="modalBotonCerrar" onclick="cerrarVentanaModal();"></div> -->
				<div id="modalContenido">okdfdfddfdfdfdfddf</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>