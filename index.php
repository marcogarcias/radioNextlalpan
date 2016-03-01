<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan/app/paths.php';// 'app/paths.php';
include("php/librerias.php");
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