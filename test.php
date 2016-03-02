<?php
$serv = $_SERVER['DOCUMENT_ROOT'].'/dominios/radionextlalpan';
$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
//echo $pathFile;
//echo '<br />';
$pathFile = $pathFile.'/app/paths.php';
echo $pathFile;
//echo '<br />';
//var_dump(dirname(__FILE__));
echo '<br />';
var_dump(is_file($pathFile));
?>