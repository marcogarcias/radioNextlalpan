<?php session_start(); ?>
<?php
require_once '../../app/Utils.php';
require_once '../../app/controller/login/LoginCtrl.php';
//include("adminLibrerias.php");
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