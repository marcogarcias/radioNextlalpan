<?php session_start(); ?>
<?php
$serv = $_SERVER['DOCUMENT_ROOT'].'/dominios/radionextlalpan';
$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
$pathFile = $pathFile.'/app/paths.php';
require_once $pathFile;

$appPath = PATH.'/app';
$ctrlPath = PATH.'/app/controller';
require_once $appPath.'/Utils.php';
require_once $ctrlPath.'/login/LoginCtrl.php';
require_once $ctrlPath.'/patrocinadores/PatrocinadoresCtrl.php';
$loginCtrl = new LoginCtrl();

// comprobando que la sesión esté activa
$loginCtrl->checkActiveSessionCtrl('login');

$patr = new PatrocinadoresCtrl();
$list = $patr->getAllPatrocinadores();
$table = $patr->getTablePatrocinadores($list);

$error = isset($_SESSION["resSubmit"]['error']) ? $_SESSION["resSubmit"]['error'] : null;
$hide = $error ? '' : 'hide';
$msg = isset($_SESSION["resSubmit"]['msg']) ? $_SESSION["resSubmit"]['msg'] : null;


Utils::headPageAdmin();
?>

<body>
<?php 
Utils::getHeaderAdmin('RADIO NEXTLALPAN - management');
Utils::getNavAdmin('patrocinadores', 'listPatrocinadores');
?>

<section>
	<article>
<?php Utils::getUserDataAdmin(); ?>
	</article>

	<article>
		<div class="row">
			<div class="col-md-12">
				<div id="msg"></div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><strong>Patrocinadores registrados</strong></div>
					<div class="panel-body">
						<?php echo $table; ?>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>

<?php Utils::getFooterAdmin(); ?>
<script>
$(document).ready(function(){
	
});
</script>
</body>
</html>