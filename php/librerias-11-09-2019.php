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
		<meta property="fb:admins" content="100011228923509"/>
		<title>RADIO NEXTLALPAN</title>
		<link href="public/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="public/css/estilos.css" rel="stylesheet" />
		<link rel="shortcut icon" href="img/varios/logoRadioIcono01.ico" type="image/x-icon" />
		<script src="public/js/jquery-1.12.0.js"></script>
		<script src="public/libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="public/js/SliderV1.js"></script>
		<script src="public/js/index.js"></script>
		<script src="public/js/Menu.js"></script>
	</head>

<body>
<div id="fb-root"></div>
<script>

// linkeado a la página de radionextlalpan
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/*
// linkeado a la página de facebook
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.5";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));*/
</script>

<div id="contenedor" align="center">
	<table class="tablaContenedor" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2">
				<div id="cabecera">
					<div id="cabeceraLogoG">
						<img src="public/img/cabecera/radioNextlalpan-round.png" width="330" height="330" />
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
<!-- BEGINS: RADIONOMY -->
		<!-- <script>
			/*(function (win, doc, script, source, objectName) { (win.RadionomyPlayerObject = win.RadionomyPlayerObject || []).push(objectName); win[objectName] = win[objectName] || function (k, v) { (win[objectName].parameters = win[objectName].parameters || { src: source, version: '1.1' })[k] = v; }; var js, rjs = doc.getElementsByTagName(script)[0]; js = doc.createElement(script); js.async = 1; js.src = source; rjs.parentNode.insertBefore(js, rjs); }(window, document, 'script', 'https://www.radionomy.com/js/radionomy.player.js', 'radplayer'));
			radplayer('url', 'radionextlalpan');
			radplayer('type', 'mobile');
			radplayer('autoplay', '1');
			radplayer('volume', '50');
			radplayer('color1', '#fc150d');
			radplayer('color2', '#29ff29');*/
		</script>
		<div class="radionomy-player"></div> -->
<!-- ENDS -->

<!-- BEGINS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
		<script type="text/javascript" src="https://hosted.muses.org/mrp.js"></script>
		<script type="text/javascript">
			MRP.insert({
				'url':'http://109.169.23.20:6111/;',
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

<!-- EMPIEZA MIXSTREAM  (04/09/2019)
		<script>
		// MixStream Flash Player, http://mixstreamflashplayer.net/ 
		var flashvars = {};flashvars.serverHost = "87.117.228.65:32621/;";flashvars.getStats = "1";flashvars.autoStart = "1";flashvars.textColour = "fffffff";flashvars.buttonColour = "009100";var params = {};params.bgcolor= "b80000";
		</script>
		<script type="text/javascript" src="http://mixstreamflashplayer.net/v1.3.js"></script>
-->

<!-- BEGINS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
		<!-- <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="300" height="113">
		<param name="movie" value="muses.swf" />
		<param name="flashvars" value="url=http://109.169.23.20:6111/;&lang=auto&codec=mp3&volume=65&introurl=&autoplay=true&tracking=true&jsevents=true&buffering=3&skin=ffmp3-cristal.xml&title=RADIO%20NEXTLALPAN&welcome=WELCOME%20TO..." />
		<param name="wmode" value="transparent" />
		<param name="allowscriptaccess" value="always" />
		<param name="scale" value="noscale" />
		<embed src="muses.swf" flashvars="url=http://109.169.23.20:6111/;&lang=auto&codec=mp3&volume=65&introurl=&autoplay=true&tracking=true&jsevents=true&buffering=3&skin=ffmp3-cristal.xml&title=RADIO%20NEXTLALPAN&welcome=WELCOME%20TO..." width="300" scale="noscale" height="113" wmode="transparent" allowscriptaccess="always" type="application/x-shockwave-flash" />
		</object> -->
<!-- ENDS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
	</div>
</div>
<?php
}

// funcion que contiene el carrusel de imagenes que esta en la cabecera
function sliderV1(){ ?>
<div id="sliderV1Cont">
	<img src="public/img/sliderV1/sliderV1.png" id="sliderV1Portada" width="990" height="225">
	<div id="sliderV1">
		<!-- <img src="public/img/sliderV1/slider1.jpg" id="slider1" width="990" height="225" />
		<img src="public/img/sliderV1/slider2.jpg" id="slider2" width="990" height="225" /> -->
	</div>
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
			<li><a href="index.php?sec=index#index" class="seccionA" id="inicio">INICIO</a></li> <?php }
		else{ ?>
			<li><a href="index.php?sec=index#index" class="seccion" id="inicio">INICIO</a></li> <?php }
		if($secGet=="programacion"){ ?>
			<li><a href="programacion.php?sec=programacion#programacion" class="seccionA" id="programacion">PROGRAMACI&Oacute;N</a></li> <?php }
		else{ ?>
			<li><a href="programacion.php?sec=programacion#programacion" class="seccion" id="programacion">PROGRAMACI&Oacute;N</a></li> <?php }
		if($secGet=="galeria"){ ?>
			<li><a href="javascript:;" class="seccionA">GALER&Iacute;A</a>
				<ul>
					<li><a href="javascript:;" class="seccion">FOTOS</a></li>
					<li><a href="javascript:;" class="seccion">VIDEOS</a></li>
					<li><a href="javascript:;" class="seccion">PODCAST</a></li>
				</ul>
			</li> <?php }
		else{ ?>
			<li><a href="javascript:;" class="seccion">GALER&Iacute;A</a>
				<ul>
					<li><a href="javascript:;" class="seccion">FOTOS</a></li>
					<li><a href="javascript:;" class="seccion">VIDEOS</a></li>
					<li><a href="javascript:;" class="seccion">PODCAST</a></li>
				</ul>
			</li> <?php }
		if($secGet=="servicios"){ ?>
			<li><a href="servicios.php?sec=servicios#servicios" class="seccionA" id="servicios">SERVICIOS</a></li> <?php }
		else{ ?>
			<li><a href="servicios.php?sec=servicios#servicios" class="seccion" id="servicios">SERVICIOS</a></li> <?php }
		if($secGet=="patrocinadores"){ ?>
			<li><a href="patrocinadores.php?sec=patrocinadores#patrocinadores" class="seccionA" id="patrocinadores">PATROCINADORES</a></li> <?php }
		else{ ?>
			<li><a href="patrocinadores.php?sec=patrocinadores#patrocinadores" class="seccion" id="patrocinadores">PATROCINADORES</a></li> <?php }
		if($secGet=="facebook"){ ?>
			<li><a href="facebook.php?sec=facebook#facebook" class="seccionA" id="facebook">FACEBOOK</a></li><?php }
		else{ ?>
			<li><a href="facebook.php?sec=facebook#facebook" class="seccion" id="facebook">FACEBOOK</a></li><?php }
		if($secGet=="comunidades"){ ?>
			<!--<li><a href="comunidades.php?sec=comunidades#comunidades" class="seccionA">COMUNIDADES</a></li>--><?php }
		else{ ?>
			<!--<li><a href="comunidades.php?sec=comunidades#comunidades" class="seccion">COMUNIDADES</a></li>--> <?php }
		if($secGet=="contacto"){ ?>
			<li><a href="contacto.php?sec=contacto#contacto" class="seccionA" id="contactos">CONTACTOS</a></li> <?php }
		else{ ?>
			<li><a href="contacto.php?sec=contacto#contacto" class="seccion" id="contactos">CONTACTOS</a></li> <?php } ?>
			<li style="float:right;">
			</li> <?php
			
	}
	else{ ?>
		<li><a href="index.php?sec=index#index" class="seccion" id="inicio">INICIO</a></li>
		<li><a href="programacion.php?sec=programacion#programacion" class="seccion" id="programacion">PROGRAMACI&Oacute;N</a></li>
		<li><a href="javascript:;" class="seccion">GALER&Iacute;A</a>
			<ul>
				<li><a href="javascript:;" class="seccion">FOTOS</a></li>
				<li><a href="javascript:;" class="seccion">VIDEOS</a></li>
				<li><a href="javascript:;" class="seccion">PODCAST</a></li>
			</ul>
		</li>
		<li><a href="servicios.php?sec=servicios#servicios" class="seccion" id="servicios">SERVICIOS</a></li>
		<li><a href="patrocinadores.php?sec=patrocinadores#patrocinadores" class="seccion" id="patrocinadores">PATROCINADORES</a></li>
		<li><a href="facebook.php?sec=facebook#facebook" class="seccion" id="facebook">FACEBOOK</a></li>
		<li><a href="contacto.php?sec=contacto#contacto" class="seccion" id="contactos">CONTACTOS</a></li>
		<li style="float:right;">
		</li> <?php 
	}
	?>
	</ul>
</div>
<?php
}

function comentarios_fb(){
?>
	<div class="comentarios_fb">
		<div id="fb-comments_" class="fb-comments" data-href="http://radionextlalpan.mx/" data-width="540" data-numposts="5" data-order-by="reverse_time"></div>
		<!-- <div id="fb-comments_" class="fb-comments" data-href="https://www.facebook.com/profile.php?id=100011228923509" data-width="240" data-numposts="5" data-order-by="reverse_time"></div> -->
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
    <tr><td colspan="2">
      <iframe src="http://www.ustream.tv/combined-embed/17390050?videos=gallery&videosCount=8&html5ui" style="border: 0 none transparent;"  webkitallowfullscreen allowfullscreen frameborder="no" width="100%" height="752"></iframe>
    </td></tr>
	</table>
	<?php comentarios_fb(); ?>
</div>
<?php
	pieDePagina();
?>
</body>
</html>
<?php
}

function galeriaDinamica01(){ 
	/*require_once 'app/controller/slider/SliderCtrl.php';
	$sliderV2 = new SliderCtrl();
	$res = $sliderV2->getAllImgsCtrl();*/
	?>
	<div id="galDin00Div">
		<div class="galeriaDinamica01Img">
			<img src="public/img/varios/radioNextlalpan-cabina-middle.jpg" width="550" height="350" />
		</div>
		<div id="galDinPie01" class="galeriaDinamica01Footer">
			<span>Radio Nextlalpan</span>
		</div>
	</div>
<?php
/*conexion();
$datosCarrusel;
$cont=0;
$datosCarrusel=obtenerDatosCarrusel(); ?>
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
	
}*/
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
    </td></tr>
  </table>
</div>

<?php
}

function pieDePagina(){ ?>

<?php
}
?>
