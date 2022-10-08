<?php
/*$serv = $_SERVER['DOCUMENT_ROOT'];
$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
$pathFile = $pathFile.'/app/paths.php';
require_once $pathFile;*/

if($_SERVER['SERVER_NAME'] == "localhost"){
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}/radioNextlalpan");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}/radioNextlalpan");
}else{
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}");
}

require_once ROOT_PATH.'/app/controller/login/LoginCtrl.php';
$loginCtrl = new LoginCtrl();
$loginCtrl->logout();
?>