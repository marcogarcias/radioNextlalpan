<?php
session_start();
include("adminLibrerias.php");
comprobarSesion();
head();
?>
<body>
<?php

if(isset($_FILES["agregarImgCampo"]["tmp_name"])){
	$titImg=$_POST["titImg"];
	$desMiniImg=$_POST["desMiniImg"];
	$desFullImg=$_POST["desFullImg"];
	/*$visibleCarrusel=$_POST["visibleCarrusel"];
	$visibleArticulo=$_POST["visibleArticulo"];
	
	// se combierten los valores boleanos 'SI' y 'NO' a '1' y '0' respectivamente para ser insertados a campos de tipo tinyint
	if($visibleCarrusel=='si')
		$visibleCarrusel=1;
	else
		$visibleCarrusel=0;
	// se combierten los valores boleanos 'SI' y 'NO' a '1' y '0' respectivamente para ser insertados a campos de tipo tinyint
	if($visibleArticulo=='si')
		$visibleArticulo=1;
	else
		$visibleArticulo=0;	
	
	echo "carrusel: ".$visibleCarrusel."<br/>";
	echo "carrusel: ".$visibleArticulo."<br/>";*/
	
	$path = "../../img/galeriaDinamica01/";
	$nombre = $_FILES["agregarImgCampo"]["name"];
	$tamano = $_FILES["agregarImgCampo"]["size"];
	$tipo = $_FILES["agregarImgCampo"]["type"];
	$prefijo = substr(md5(uniqid(rand())),0,3);
	$nombre=$prefijo."_".$nombre; // se aplica un prefijo al nombre de la imagen por si se agrega una imagen con el mismo nombre no cause conflictos
	if(copy($_FILES["agregarImgCampo"]["tmp_name"], $path.$nombre)){
		//insertarArticuloGaleriaDinamica($titImg, $desMiniImg, $desFullImg, $nombre, $visibleCarrusel, $visibleArticulo);
		insertarArticuloGaleriaDinamica($titImg, $desMiniImg, $desFullImg, $nombre);
		echo"<script>location.href='galeriaDinamicaAdmin01.php';</script>";
	}
	else{
		echo "<h1>Atenci&oacute;n. Ha ocurrido un error al subir la imagen.</h1>";
	}
}
else{
?>

<div id="contenedor">
	<div id="cabecera"></div>
	<div id="contenedorAdmin">
		<div id="contAdminCabecera">
			<h2>AGREGAR IMAGEN</h2>
			<input type="button" value="AGREGAR IMAGEN" class="botonAdmin" onclick="galDin01AgregarImagen();" />
		</div>
		<?php separador(); ?>
			<div class="galDin01FormAgregarImg">
				<form method="post" action="galDin01AgregarImagen.php"  id="agregarImg" name="agregarImg" enctype="multipart/form-data">
					<label for="titImg">T&iacute;tulo</label>
					<input type="text" name="titImg" id="titImg" placeholder="T&iacute;tulo del articulo" class="bloque" />
					<div id="titImgNull"></div>
					
					<label for="desMiniImg">Descripci&oacute;n resumen</label>
					<input type="text" name="desMiniImg" id="desMiniImg" placeholder="Descripci&oacute;n resumen del articulo" class="bloque" />
					<div id="desMiniImgNull"></div>
					
					<label for="desFullImg">Descripci&oacute;n Completa</label>
					<textarea name="desFullImg" rows="4" id="desFullImg" placeholder="Descripci&oacute;n completa del articulo" class="bloque"></textarea>
					<div id="desFullImgNull"></div>
					
					<label for="agregarImg">Imagen</label>
					<input type="file" name="agregarImgCampo" id="agregarImgCampo" class="bloque" />
					<div id="agregarImgNull"></div>
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
					<input type="button" value="subir" class="galDin01FormAgregarImgBoton" onclick="comprobarArchivoCargado();" />
				</form>
			</div>
		</td><td>
	</div>
</div>
<?php
}
?>
</body>
</html>
