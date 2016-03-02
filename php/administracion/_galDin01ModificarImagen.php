<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();
head();
?>
<body>
<?php

if(isset($_POST["titImg"])){
	$titImg=$_POST["titImg"];
	$desMiniImg=$_POST["desMiniImg"];
	$desFullImg=$_POST["desFullImg"]; 
	$nomImgActual=$_POST["nomImg"]; 
	$idImg=$_POST["idImg"];
	
	galDin01ModificarImagenRegistro($idImg, $nomImgActual, $titImg, $desMiniImg, $desFullImg);
	
	if(!$_FILES["modificarImgCampo"]["error"]==UPLOAD_ERR_NO_FILE){
		$path = "../../img/galeriaDinamica01/";
		$nombre = $_FILES["modificarImgCampo"]["name"];
		$tamano = $_FILES["modificarImgCampo"]["size"];
		$tipo = $_FILES["modificarImgCampo"]["type"];
		$prefijo = substr(md5(uniqid(rand())),0,3);
		$nombre=$prefijo."_".$nombre; // se aplica un prefijo al nombre de la imagen por si se agrega una imagen con el mismo nombre no cause conflictos
		galDin01ModificarImagenRegistro($idImg, $nombre, $titImg, $desMiniImg, $desFullImg);
		if(copy($_FILES["modificarImgCampo"]["tmp_name"], $path.$nombre)){
			unlink("../../img/galeriaDinamica01/".$nomImgActual."");
		}
		else{
			echo "<h1>Atenci&oacute;n. Ha ocurrido un error al subir la imagen.</h1>";
		}
	}
	else{
		galDin01ModificarImagenRegistro($idImg, $nomImgActual, $titImg, $desMiniImg, $desFullImg);
	}
	echo"<script>location.href='galeriaDinamicaAdmin01.php';</script>";
	/*$path = "../../img/galeriaDinamica01/";
	$nombre = $_FILES["modificarImgCampo"]["name"];
	$tamano = $_FILES["modificarImgCampo"]["size"];
	$tipo = $_FILES["modificarImgCampo"]["type"];
	$prefijo = substr(md5(uniqid(rand())),0,3);
	$nombre=$prefijo."_".$nombre; // se aplica un prefijo al nombre de la imagen por si se agrega una imagen con el mismo nombre no cause conflictos
	if(copy($_FILES["modificarImgCampo"]["tmp_name"], $path.$nombre)){
		//insertarArticuloGaleriaDinamica($titImg, $desMiniImg, $desFullImg, $nombre, $visibleCarrusel, $visibleArticulo);
		insertarArticuloGaleriaDinamica($titImg, $desMiniImg, $desFullImg, $nombre);
		echo"<script>location.href='galeriaDinamicaAdmin01.php';</script>";
	}
	else{
		echo "<h1>Atenci&oacute;n. Ha ocurrido un error al subir la imagen.</h1>";
	}*/
}
else{
	$articulo;
	$idComunicado=$_GET["idComunic"];
	$articulo=obtenerArticuloPorId($idComunicado);
	
	while($fila=mysql_fetch_array($articulo)){	?>
<div id="contenedor">
	<div id="cabecera"></div>
	<div id="contenedorAdmin">
		<div id="contAdminCabecera">
			<h2>MODIFICAR IMAGEN</h2>
		</div>
		<?php separador(); ?>
			<div class="galDin01FormAgregarImg">
				<form method="post" action="galDin01ModificarImagen.php"  id="modificarImg" name="modificarImg" enctype="multipart/form-data">
					<table border="0" width="100%"><tr><td width="50%">
						<label for="titImg">T&iacute;tulo</label>
						<input type="text" name="titImg" id="titImg" placeholder="T&iacute;tulo del articulo" class="bloque" value="<?php echo $fila[2]; ?>" />
						<div id="titImgNull"></div>
						
						<label for="desMiniImg">Descripci&oacute;n resumen</label>
						<input type="text" name="desMiniImg" id="desMiniImg" placeholder="Descripci&oacute;n resumen del articulo" class="bloque" value="<?php echo $fila[3]; ?>" />
						<div id="desMiniImgNull"></div>
						
						<label for="desFullImg">Descripci&oacute;n Completa</label>
						<textarea name="desFullImg" rows="4" id="desFullImg" placeholder="Descripci&oacute;n completa del articulo" class="bloque"><?php echo $fila[4]; ?></textarea>
						<div id="desFullImgNull"></div>
					</td>
					<td>
						<img src="../../img/galeriaDinamica01/<?php echo $fila[1]; ?>" width="160" height="160" alt="<?php echo $fila[2]; ?>" title="<?php echo $fila[2]; ?>" />
					</td></tr></table>
					
					<label for="agregarImg">Imagen</label>
					<input type="file" name="modificarImgCampo" id="modificarImgCampo" class="bloque" />
					<div id="agregarImgNull"></div>
					
					<input type="hidden" id="nomImg" name="nomImg" value="<?php echo $fila[1]; ?>" />
					<input type="hidden" id="idImg" name="idImg" value="<?php echo $fila[0]; ?>" />
					<!--
					<label>Agregar al carrusel?</label>
					<p class="bloque">
						<input type="radio" class="tipeRadio" name="visibleCarrusel" id="visibleCarruselSi" value="si" /><span class="spanRadio">Si</span>
						<input type="radio" class="tipeRadio" name="visibleCarrusel" id="visibleCarruselNo" value="no" /><span class="spanRadio">No</span>
					</p>
					<div id="visibleCarruselNull"></div>
					
					<label>Visualizar en comunicados</label>
					<p class="bloque">
						<input type="radio" class="tipeRadio" name="visibleArticulo" id="visibleArticuloSi" value="si" /><span class="spanRadio">Si</span>
						<input type="radio" class="tipeRadio" name="visibleArticulo" id="visibleArticuloNo" value="no" /><span class="spanRadio">No</span>
					</p>
					<div id="visibleArticuloNull"></div>
					-->
					<input type="button" value="modificar" class="galDin01FormAgregarImgBoton" onclick="comprobarModificarArchivo(<?php echo $idComunicado; ?>);" />
					<input type="button" value="cancelar" class="galDin01FormAgregarImgBoton" onclick="homeAdmin();" />
				</form>
			</div>
		</td><td>
	</div>
</div>
<?php	
	}
}
?>
</body>
</html>