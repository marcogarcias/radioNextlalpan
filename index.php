<?php
$serv = $_SERVER['DOCUMENT_ROOT'].'/dominios/radionextlalpan';
$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
$pathFile = $pathFile.'/app/paths.php';
require_once $pathFile;
//require_once $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan/app/paths.php';// 'app/paths.php';
include(PATH."/php/librerias.php");
echo inicioPagina();
?>
<div id="contenido" class="contenido">
<a name="index"></a>
<?php
galeriaDinamica01();
?>
</div>
<?php
echo finalPagina();
?>