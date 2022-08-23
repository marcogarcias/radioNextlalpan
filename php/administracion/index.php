<?php session_start(); ?>
<?php
//$serv = $_SERVER['DOCUMENT_ROOT'];
//$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
//$pathFile = $pathFile.'/app/paths.php';
//require_once $pathFile;
if($_SERVER['SERVER_NAME'] == "localhost"){
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}/radioNextlalpan");
}else{
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}");
}

require_once ROOT_PATH.'/app/Utils.php';
require_once ROOT_PATH.'/app/controller/login/LoginCtrl.php';

//require_once '../../app/Utils.php';
//require_once '../../app/controller/login/LoginCtrl.php';
$loginCtrl = new LoginCtrl();
$loginCtrl->checkActiveSessionCtrl('login');
$error = isset($_SESSION["resSubmit"]['error']) ? $_SESSION["resSubmit"]['error'] : null;
$hide = $error ? '' : 'hide';
$msg = isset($_SESSION["resSubmit"]['msg']) ? $_SESSION["resSubmit"]['msg'] : null;

Utils::headPageAdmin();
?>

<body>
<?php 
Utils::getHeaderAdmin('RADIO NEXTLALPAN - management');
Utils::getNavAdmin('dashboard');
?>

<section>
	<article>
<?php Utils::getUserDataAdmin(); ?>

	</article>
</section>

<?php Utils::getFooterAdmin(); ?>
</body>
</html>