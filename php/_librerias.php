<?php
function conexion(){
	//mysql_connect("10.33.143.24", "axapusco_root", "rootPax4pusc0", false, 65536);
	mysql_connect("localhost", "root", "", false, 65536);
	mysql_select_db("axapusco_axapusco") or die("Error al intentar conectar a la base de datos");
}

function obtenerDatosComunicados(){
	conexion();
	$datosComunicados=mysql_query("CALL datosComunicados();") or die("Error al invocar el SP");
	return $datosComunicados; 
}

function obtenerDatosComunicado($idCom){
	conexion();
	$datosComunicado=mysql_query("CALL datosComunicado(".$idCom.");") or die("Error al invocar el SP");
	return $datosComunicado; 
}

function obtenerDatosCarrusel(){
	conexion();
	$datosCarrusel=mysql_query("CALL datosCarrusel();") or die("Error al invocar el SP. Detalles del error: ".mysql_error());
	return $datosCarrusel; 
}

function inicioPagina(){ ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>RADIO NEXTLALPAN</title>
		<link href="css/index.css" rel="stylesheet" />
		<link href="css/reveal.css" rel="stylesheet" />
		<link rel="shortcut icon" href="img/varios/logoRadioIcono01.ico" type="image/x-icon" />
		<script src="js/jquery-1.8.2.min.js"></script>
		<script src="js/jquery.reveal.js"></script>
		<script src="js/SliderV1.js"></script>
		<script src="js/index.js"></script>
	</head>

<body>
<div id="contenedor" align="center">
	<table class="tablaContenedor" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2">
				<div id="cabecera">
					<div id="cabeceraLogoG">
						<img src="img/partes/radioNextlalpan-round.png" width="330" height="330" />
					</div>
					<?php
					// funcion que contiene la imagen de la cabecera
						cabeceraBanner();

					// funcion que contiene el carrusel de imagenes que esta en la cabecera
						sliderV1();
					?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php
				// funcion 	que contiene al menu horizontal de la cabecera
					menuHorizontal();
				?>
			</td>
		</tr>
		<tr>
			<td width="750" valign="top">
<?php
}

// funcion que contiene la imagen de la cabecera
function cabeceraBanner(){ ?>
<div id="cabeceraBanner">
	<div class="reproductor">
<!-- BEGINS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
<script type="text/javascript" src="https://hosted.muses.org/mrp.js"></script>
<script type="text/javascript">
MRP.insert({
'url':'http://50.22.218.73:30713/;',
'lang':'es',
'codec':'mp3',
'volume':50,
'autoplay':true,
'buffering':5,
'title':'RADIO NEXTLALPAN',
'welcome':'WELCOME TO...',
'bgcolor':'#FFFFFF',
'skin':'neonslim',
'width':501,
'height':32
});
</script>
<!-- ENDS -->
	</div>
</div>
<?php
}

// funcion que contiene el carrusel de imagenes que esta en la cabecera
function sliderV1(){ ?>
<div id="sliderV1">
	<img src="public/img/sliderV1/slider1.jpg" id="slider1" width="990" height="300" />
	<img src="public/img/sliderV1/slider2.jpg" id="slider2" width="990" height="300" />
	<img src="public/img/sliderV1/slider3.jpg" id="slider3" width="990" height="300" />
	<img src="public/img/sliderV1/slider4.jpg" id="slider4" width="990" height="300" />
	<!--
	<img src="img/carrusel/carruselCabecera01.jpg" id="carruselCabecera01" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera02.jpg" id="carruselCabecera02" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera03.jpg" id="carruselCabecera03" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera04.jpg" id="carruselCabecera04" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera05.jpg" id="carruselCabecera05" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera06.jpg" id="carruselCabecera06" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera07.jpg" id="carruselCabecera07" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera08.jpg" id="carruselCabecera08" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera09.jpg" id="carruselCabecera09" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera10.jpg" id="carruselCabecera10" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera11.jpg" id="carruselCabecera11" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera12.jpg" id="carruselCabecera12" width="990" height="300" /> -->

	<!-- <img src="img/carrusel/carruselCabecera13.jpg" id="carruselCabecera13" width="990" height="300" />
	<img src="img/carrusel/carruselCabecera14.jpg" id="carruselCabecera14" width="990" height="300" /> -->
</div>
<?php
}

// funcion 	que contiene al menu horizontal de la cabecera
function menuHorizontal(){
?>
<div id="menuHorizontal" class="menu">
	<ul>
	<?php
	if(isset($_GET["sec"])){
		$secGet=$_GET["sec"];
		if($secGet=="index"){ ?>
			<li><a href="index.php?sec=index#index" class="seccionA">INICIO</a></li> <?php }
		else{ ?>
			<li><a href="index.php?sec=index#index" class="seccion">INICIO</a></li> <?php }
		if($secGet=="programacion"){ ?>
			<li><a href="programacion.php?sec=programacion#programacion" class="seccionA">PROGRAMACI&Oacute;N</a></li> <?php }
		else{ ?>
			<li><a href="programacion.php?sec=programacion#programacion" class="seccion">PROGRAMACI&Oacute;N</a></li> <?php }
		if($secGet=="galeria"){ ?>
			<li><a href="galeria.php?sec=galeria#galeria" class="seccionA">GALER&Iacute;A</a>
				<ul>
					<li><a href="javascript:;" class="seccion">FOTOS</a></li>
					<li><a href="javascript:;" class="seccion">VIDEOS</a></li>
					<li><a href="javascript:;" class="seccion">PODCAST</a></li>
				</ul>
			</li> <?php }
		else{ ?>
			<li><a href="galeria.php?sec=galeria#galeria" class="seccion">GALER&Iacute;A</a>
				<ul>
					<li><a href="javascript:;" class="seccion">FOTOS</a></li>
					<li><a href="javascript:;" class="seccion">VIDEOS</a></li>
					<li><a href="javascript:;" class="seccion">PODCAST</a></li>
				</ul>
			</li> <?php }
		if($secGet=="servicios"){ ?>
			<li><a href="servicios.php?sec=servicios#servicios" class="seccionA">SERVICIOS</a></li> <?php }
		else{ ?>
			<li><a href="servicios.php?sec=servicios#servicios" class="seccion">SERVICIOS</a></li> <?php }
		if($secGet=="patrocinadores"){ ?>
			<li><a href="patrocinadores.php?sec=patrocinadores#patrocinadores" class="seccionA">PATROCINADORES</a></li> <?php }
		else{ ?>
			<li><a href="patrocinadores.php?sec=patrocinadores#patrocinadores" class="seccion">PATROCINADORES</a></li> <?php }
		if($secGet=="facebook"){ ?>
			<li><a href="facebook.php?sec=facebook#facebook" class="seccionA">FACEBOOK</a></li><?php }
		else{ ?>
			<li><a href="facebook.php?sec=facebook#facebook" class="seccion">FACEBOOK</a></li><?php }
		if($secGet=="comunidades"){ ?>
			<!--<li><a href="comunidades.php?sec=comunidades#comunidades" class="seccionA">COMUNIDADES</a></li>--><?php }
		else{ ?>
			<!--<li><a href="comunidades.php?sec=comunidades#comunidades" class="seccion">COMUNIDADES</a></li>--> <?php }
		if($secGet=="contacto"){ ?>
			<li><a href="contacto.php?sec=contacto#contacto" class="seccionA">CONTACTOS</a></li> <?php }
		else{ ?>
			<li><a href="contacto.php?sec=contacto#contacto" class="seccion">CONTACTOS</a></li> <?php } ?>
			<li style="float:right;">
			</li> <?php
			
	}
	else{ ?>
		<li><a href="index.php?sec=index#index" class="seccion">INICIO</a></li>
		<li><a href="programacion.php?sec=programacion#programacion" class="seccion">PROGRAMACI&Oacute;N</a></li>
		<li><a href="galeria.php?sec=galeria#galeria" class="seccion">GALER&Iacute;A</a>
			<ul>
				<li><a href="javascript:;" class="seccion">FOTOS</a></li>
				<li><a href="javascript:;" class="seccion">VIDEOS</a></li>
				<li><a href="javascript:;" class="seccion">PODCAST</a></li>
			</ul>
		</li>
		<li><a href="servicios.php?sec=servicios#servicios" class="seccion">SERVICIOS</a></li>
		<li><a href="patrocinadores.php?sec=patrocinadores#patrocinadores" class="seccion">PATROCINADORES</a></li>
		<li><a href="facebook.php?sec=facebook#facebook" class="seccion">FACEBOOK</a></li>
		<li><a href="contacto.php?sec=contacto#contacto" class="seccion">CONTACTOS</a></li>
		<li style="float:right;">
		</li> <?php 
	}
	?>
	</ul>
</div>
<?php
}

function finalPagina(){ ?>
			</td>
			<td width="240" valign="top">
				<?php
				// funcion que tiene el menu lateral
					menuLateral();
				?>
			</td>
		</tr>
	</table>
</div>
<?php
	pieDePagina();
?>
</body>
</html>
<?php
}

function galeriaDinamica01(){ ?>
	<!-- <div id="galDin00Div">
		<div class="galeriaDinamica01Img">
			<img src="img/partes/radioNextlalpan-cabina-middle.jpg" width="550" height="350" />
		</div>
		<div id="galDinPie01" class="galeriaDinamica01Footer">
			<span>Radio Nextlalpan</span>
		</div>
	</div> -->
<?php
require_once 'app/controller/slider/SliderCtrl.php';
$slider = new SliderCtrl();
$imgs = $slider->getAllImgsCtrl();
$cont=0; ?>
	<div id="galeriaDinamica01">
		<div id="galeriaDinamica01Contenedor">
<?php
if(mysql_num_rows($datosCarrusel)>0){ 
	while($fila=mysql_fetch_array($datosCarrusel)){ 
		$cont++; ?>
			<div id="galDin0<?php echo $cont; ?>Div">
				<div class="galeriaDinamica01Img"><img src="img/galeriaDinamica01/<?php echo $fila[1]; ?>" width="550" height="350" /></div>
				<div id="galDinPie0<?php echo $cont; ?>" class="galeriaDinamica01Footer">
					<span><?php echo $fila[3]; ?></span>
				</div>
			</div>
	<?php
	}
}
else{
	
}
?>
			<!--
			<div id="galDin02Div">
				<div class="galeriaDinamica01Img"><img src="img/galeriaDinamica01/galDin02.jpg" width="550" height="350" /></div>
				<div id="galDinPie02" class="galeriaDinamica01Footer">
					<span>El gobernador del Estado de México Eruviel Ávila Villegas encabezó la entrega del
					nombramiento de Pueblo con Encanto al Municipio de Axapusco el 12 de Marzo de 2013.</span>
				</div>
			</div>

			<div id="galDin03Div">
				<div class="galeriaDinamica01Img"><img src="img/galeriaDinamica01/galDin03.jpg" width="550" height="350" /></div>
				<div id="galDinPie03" class="galeriaDinamica01Footer">
					<span>El gobernador del Estado de México Doctor Eruviel Ávila Villegasy el Lic. Gilberto
					Ramírez Ávila Villegas Presidente Municipal de Axapusco entregan el nombramiento de Pueblo
					con Encanto a los orgullosos habitantes del Municipio de Axapusco, Estado de México.</span>
				</div>
			</div>

			<div id="galDin04Div">
				<div class="galeriaDinamica01Img"><img src="img/galeriaDinamica01/galDin04.jpg" width="550" height="350" /></div>
				<div id="galDinPie04" class="galeriaDinamica01Footer">
					<span>El gobernador del Estado de México Doctor Eruviel Ávila Villegas y el Lic. Gilberto
					Ramírez Ávila Presidente Municipal Constitucional de Axapusco develan la placa conmemorativa
					al nombramiento de Pueblo con Encanto al Municipio de Axapusco, Estado de México el 12 de
					Marzo de 2013.</span>
				</div>
			</div>

			<div id="galDin05Div">
				<div class="galeriaDinamica01Img"><img src="img/galeriaDinamica01/galDin05.jpg" width="550" height="350" /></div>
				<div id="galDinPie05" class="galeriaDinamica01Footer">
					<span>Lic. Gilberto Ramírez Ávila Presidente Municipal Constitucional de Axapusco en el marco
					del nombramientode Axapusco como Pueblo con Encanto el 12 de Marzo de 2013.</span>
				</div>
			</div>
			-->
		</div>
		<div id="galDinNavegacion">
			<div id="galDinNavegacionBot01" onclick="galDinCambiarImg(1);">&nbsp;</div><div id="galDinNavegacionBot02" onclick="galDinCambiarImg(2);">&nbsp;</div><div id="galDinNavegacionBot03" onclick="galDinCambiarImg(3);">&nbsp;</div><div id="galDinNavegacionBot04" onclick="galDinCambiarImg(4);">&nbsp;</div><div id="galDinNavegacionBot05" onclick="galDinCambiarImg(5);">&nbsp;</div>
		</div>
	</div>
<?php
}

function menuLateral(){ ?>
<div id="menuLateral">
	<table border="0" cellpadding="0" cellspacing="0">
	        <tr><td>
	        	<script type="text/javascript" src="//ra.revolvermaps.com/0/0/6.js?i=0jp0cvsvny3&amp;m=7&amp;s=270&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
                  <!-- <ul class="subMenuDesp">
                    <li><a href="#"><img src="img/banners/conacLogo01.png" width="150" height="94" /></a>
                      <ul class="submenu1">
                        <li class="title">Título V de la CONAC:</li>
                        <li class="title">Título V (LGCG)</li>
                        <li class="title">Información Financiera de la CONAC Título V de la Ley General de Contabilidad Gubernamental.</li>
                        <li class="title"><hr /></li>
                        <li><a href="#" data-reveal-id="conac2013" onClick="hiddeSubMenuDesp();">C O N A C 2013</a></li>
                        <li><a href="#">C O N A C 2014</a>
                          <ul class="submenu2">
                            <li><a href="#" data-reveal-id="1erTrim2014" onClick="hiddeSubMenuDesp();">1er Trimestre 2014</a></li>
                            <li><a href="#" data-reveal-id="2ndoTrim2014" onClick="hiddeSubMenuDesp();">2o  Trimestre 2014</a></li>
                            <li><a href="#" data-reveal-id="3erTrim2014" onClick="hiddeSubMenuDesp();">3er Trimestre 2014</a></li>
                            <li><a href="#" data-reveal-id="4toTrim2014" onClick="hiddeSubMenuDesp();">4o  Trimestre 2014</a></li>
                            <li><a href="#" data-reveal-id="2doInfGob2014" onClick="hiddeSubMenuDesp();">2o informe de gobierno 2014</a></li>
                          </ul>
                        </li>
                        <li><a href="#">C O N A C 2015</a>
                          <ul class="submenu3">
                            <li><a href="#" data-reveal-id="1erTrim2015" onClick="hiddeSubMenuDesp();">1er Trimestre 2015</a></li>
                            <li><a href="#" data-reveal-id="2ndoTrim2015" onClick="hiddeSubMenuDesp();">2o Trimestre 2015</a></li>
                            <li><a href="#" data-reveal-id="3erTrim2015" onClick="hiddeSubMenuDesp();">3er Trimestre 2015</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul> 
		</td></tr>
		<tr><td>
			<a href="http://portal2.edomex.gob.mx/edomex/inicio/index.htm" target="_blank"><img src="img/banners/edoMexLogo02.png" width="150" height="94" /></a>
		</td></tr>
		<tr><td>
			<a href="http://inicio.ifai.org.mx/" target="_blank"><img src="img/banners/ifaiLogo01.png" width="150" height="94" /></a>
		</td></tr>
		<tr><td>
			<a href="http://www.infoem.org.mx/src/php/inicio.php" target="_blank"><img src="img/banners/infoemLogo01.png" width="150" height="94" /></a>
		</td></tr>
		<tr><td>
			<a href="http://www.ipomex.org.mx/ipo/portal/axapusco.web" target="_blank"><img src="img/banners/ipomexLogo01.png" width="150" height="94" /></a>
		</td></tr>
		<tr><td>
			<a href="http://www.saimex.org.mx/" target="_blank"><img src="img/banners/saimexLogo01.png" width="150" height="94" /></a>
		</td></tr>
		<tr><td>
			<a href="http://portal2.edomex.gob.mx/ihaem/index.htm" target="_blank"><img src="img/banners/ihaemLogo01.png" width="150" height="94" /></a>
		</td></tr>
		<tr><td>
			<a href="http://www.cddiputados.gob.mx/" target="_blank"><img src="img/banners/legislaturaLogo01.png" width="150" height="94" /></a>
		</td></tr>
		<tr><td>
                  <ul class="subMenuDesp">
                    <li><a href="#"><img src="img/banners/dependenciasMunicipalesLogo01.png" width="150" height="94" /></a>
                      <ul class="submenu1">
                        <li><a href="paginaEnConstruccion01.php">IMCUFIDE</a></li>
                        <li><a href="paginaEnConstruccion01.php">DIF</a></li>
                        <li><a href="#">H. AYUNTAMIENTO</a>
                          <ul class="submenu2">
                            <li class="title">Título V de la CONAC:</li>
                            <li class="title">Título V (LGCG)</li>
                            <li class="title">Información Financiera de la CONAC Título V de la Ley General de Contabilidad Gubernamental.</li>
                            <li class="title"><hr /></li>
                            <li><a href="#" data-reveal-id="conac2013" onClick="hiddeSubMenuDesp();">C O N A C 2013</a></li>
                            <li><a href="#">C O N A C 2014</a>
                              <ul class="submenu3">
                                <li><a href="#" data-reveal-id="1erTrim2014" onClick="hiddeSubMenuDesp();">1er Trimestre 2014</a></li>
                                <li><a href="#" data-reveal-id="2ndoTrim2014" onClick="hiddeSubMenuDesp();">2o  Trimestre 2014</a></li>
                                <li><a href="#" data-reveal-id="3erTrim2014" onClick="hiddeSubMenuDesp();">3er Trimestre 2014</a></li>
                                <li><a href="#" data-reveal-id="4toTrim2014" onClick="hiddeSubMenuDesp();">4o  Trimestre 2014</a></li>
                                <li><a href="#" data-reveal-id="2doInfGob2014" onClick="hiddeSubMenuDesp();">2o informe de gobierno 2014</a></li>
                              </ul>
                            </li>
                            <li><a href="#">C O N A C 2015</a>
                              <ul class="submenu4">
                                <li><a href="#" data-reveal-id="1erTrim2015" onClick="hiddeSubMenuDesp();">1er Trimestre 2015</a></li>
                                <li><a href="#" data-reveal-id="2ndoTrim2015" onClick="hiddeSubMenuDesp();">2o  Trimestre 2015</a></li>
                                <li><a href="#" data-reveal-id="3erTrim2015" onClick="hiddeSubMenuDesp();">3er  Trimestre 2015</a></li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul> -->
		</td></tr>
	</table>
</div>
<!-- divs de ventanas modales -->
<div id="conac2013" class="reveal-modal full" style="display:none;">
  <p id="depMunModCabecera">
  	<h1>CONAC 2013</h1>
    <span>Dependencias</span>
    <span>Municipales</span>
  </p>
  <p id="esxcel">
    <iframe src="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2013/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO.htm" width="100%" height="700"> </iframe>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  <a class="boton02" href="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2013/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO.xlsx">D E S C A R G A R</a>
</div>

<div id="1erTrim2014" class="reveal-modal full" style="display:none;">
  <p id="depMunModCabecera">
  	<h1>1er Trimestre 2014</h1>
  </p>
  <p id="esxcel">
    <iframe src="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2014/1erTrimestre/FORMATOS_CONAC_marzo_2014.htm" width="100%" height="700"> </iframe>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  <a class="boton02" href="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2014/1erTrimestre/FORMATOS_CONAC_marzo_2014.xlsx">D E S C A R G A R</a>
</div>

<div id="2ndoTrim2014" class="reveal-modal full" style="display:none;">
  <p id="depMunModCabecera">
  	<h1>2ndo Trimestre 2014</h1>
  </p>
  <p id="esxcel">
    <iframe src="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2014/2ndoTrimestre/FORMATOS_CONAC_JUNIO_2014.htm" width="100%" height="700"> </iframe>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  <a class="boton02" href="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2014/2ndoTrimestre/FORMATOS_CONAC_JUNIO_2014.xlsx">D E S C A R G A R</a>
</div>

<div id="3erTrim2014" class="reveal-modal full" style="display:none;">
  <p id="depMunModCabecera">
  	<h1>3er Trimestre 2014</h1>
  </p>
  <p id="esxcel">
    <iframe src="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2014/3erTrimestre/FORMATOS_CONAC_SEPTIEMBRE_2014.htm" width="100%" height="700"> </iframe>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  <a class="boton02" href="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2014/3erTrimestre/FORMATOS_CONAC_SEPTIEMBRE_2014.xlsx">D E S C A R G A R</a>
</div>

<div id="4toTrim2014" class="reveal-modal full" style="display:none;">
  <p id="depMunModCabecera">
  	<h1>4o  Trimestre 2014</h1>
  </p>
  <p id="esxcel">
    <iframe src="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2014/4toTrimestre/CONAC_TRIMESTRALES.htm" width="100%" height="700"> </iframe>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  <a class="boton02" href="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2014/4toTrimestre/CONAC_TRIMESTRALES.xlsx">D E S C A R G A R</a>
</div>

<div id="2doInfGob2014" class="reveal-modal full" style="display:none;">
  <p id="depMunModCabecera">
  	<h1>2o informe de gobierno 2014</h1>
  </p>
  <p id="esxcel">
    <iframe src="doc/SEGUNDO_INFORME_DE_GOBIERNO.pdf" width="100%" height="700"> </iframe>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  <a class="boton02" href="doc/SEGUNDO_INFORME_DE_GOBIERNO.pdf">D E S C A R G A R</a>
</div>

<div id="1erTrim2015" class="reveal-modal full" style="display:none;">
  <p id="depMunModCabecera">
  	<h1>1er Trimestre 2015</h1>
  </p>
  <p id="esxcel">
    <iframe src="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2015/1erTrimestre/CONAC_1er_Trimestre_2015_FINAL.htm" width="100%" height="700"> </iframe>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  <a class="boton02" href="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2015/1erTrimestre/CONAC_1er_Trimestre_2015_FINAL.xlsx">D E S C A R G A R</a>
</div>

<div id="2ndoTrim2015" class="reveal-modal full" style="display:none;">
  <p id="depMunModCabecera">
  	<h1>2ndo Trimestre 2015</h1>
  </p>
  <p id="esxcel">
    <iframe src="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2015/2ndoTrimestre/CONAC_2DO_Trimestre_2015_FINAL.htm" width="100%" height="700"> </iframe>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  <a class="boton02" href="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2015/2ndoTrimestre/CONAC_2DO_Trimestre_2015_FINAL.xlsx">D E S C A R G A R</a>
</div>

<div id="3erTrim2015" class="reveal-modal full" style="display:none;">
  <p id="depMunModCabecera">
  	<h1>3er Trimestre 2015</h1>
  </p>
  <p id="esxcel">
    <iframe src="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2015/3erTrimestre/CONAC_3ER_Trimestre_2015_FINAL.htm" width="100%" height="700"> </iframe>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  <a class="boton02" href="doc/TRANSPARENCIA_CONAC_FORMATOS_EN_BLANCO_ENVIO/conac2015/3erTrimestre/CONAC_3ER_Trimestre_2015_FINAL.xlsx">D E S C A R G A R</a>
</div>

<?php
}

function pieDePagina(){ ?>

<?php
}
?>