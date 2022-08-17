<?php
$serv = $_SERVER['DOCUMENT_ROOT'];
$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
$pathFile = $pathFile.'/app/paths.php';
require_once $pathFile;

require_once PATH.'/app/controller/login/LoginCtrl.php';
$loginCtrl = new LoginCtrl();
$loginCtrl->logout();
?>