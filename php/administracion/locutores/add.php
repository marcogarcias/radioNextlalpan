<?php session_start(); ?>
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

$appPath = ROOT_PATH.'/app';
$ctrlPath = ROOT_PATH.'/app/controller';

require_once $appPath.'/Utils.php';
require_once $ctrlPath.'/login/LoginCtrl.php';
require_once $ctrlPath.'/locutores/LocutoresCtrl.php';
$loginCtrl = new LoginCtrl();

if($_POST){
	$locutores = new LocutoresCtrl();
	$locutores->addLocutores($_POST, $_FILES);
	die('...');
}else
	$loginCtrl->checkActiveSessionCtrl('login');

// verificar los permisos que tiene el usuario por comparación bitwise
$disabled = ($_SESSION['grupoPermisos'] & 2) ? '' : 'disabled';

$error = isset($_SESSION["resSubmit"]['error']) ? $_SESSION["resSubmit"]['error'] : null;
$hide = $error ? '' : 'hide';
$msg = isset($_SESSION["resSubmit"]['msg']) ? $_SESSION["resSubmit"]['msg'] : null;
if(isset($_SESSION["resSubmit"]))  unset($_SESSION["resSubmit"]);

Utils::headPageAdmin();
?>

<body>
<?php 
Utils::getHeaderAdmin('RADIO NEXTLALPAN - management');
Utils::getNavAdmin('locutores', 'addLocutores');
?>

<section>
	<article>
<?php Utils::getUserDataAdmin(); ?>
	</article>

	<article>
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				<div class="panel panel-primary" id="addPanel">
					<div class="panel-heading"><strong>Agregar locutor</strong></div>
					<div class="panel-body">
						<form name="login" method="post" class="form-horizontal" id="locutoresAddForm" enctype="multipart/form-data">
							<div class="alert alert-<?php echo $error.' '.$hide; ?>" role="alert">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								<?php echo $msg; ?>
							</div>
							
							<div class="form-group has-feedback" id="name1-group">
								<div class="col-md-12">
									<label for="name1" class="control-label">Nombre: </label>
									<input type="text" name="name1" id="name1" class="form-control" placeholder="Nombre" data-notnull="0" <?php echo $disabled; ?> />
									<span id="name1-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="name1-help-block" class="help-block"></span>
								</div>
							</div>

              <div class="form-group has-feedback" id="name2-group">
								<div class="col-md-12">
									<label for="name2" class="control-label">Segundo nombre: </label>
									<input type="text" name="name2" id="name2" class="form-control" placeholder="Segundo nombre" data-notnull="0" <?php echo $disabled; ?> />
									<span id="name2-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="name2-help-block" class="help-block"></span>
								</div>
							</div>

              <div class="form-group has-feedback" id="ap-group">
								<div class="col-md-12">
									<label for="ap" class="control-label">Apellido paterno: </label>
									<input type="text" name="ap" id="ap" class="form-control" placeholder="Apellido paterno" data-notnull="0" <?php echo $disabled; ?> />
									<span id="ap-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="ap-help-block" class="help-block"></span>
								</div>
							</div>

              <div class="form-group has-feedback" id="am-group">
								<div class="col-md-12">
									<label for="am" class="control-label">Apellido materno: </label>
									<input type="text" name="am" id="am" class="form-control" placeholder="Apellido materno" data-notnull="0" <?php echo $disabled; ?> />
									<span id="am-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="am-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="image-group">
								<div class="col-md-12">
									<label for="image" class="control-label">Imágen: </label>
									<input type="file" name="image" id="image" placeholder="Imagen" data-notnull="1" <?php echo $disabled; ?> />
									<span id="image-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="image-help-block" class="help-block"></span>
									<span>formato: jpg, dimensión: entre 200x200 y 1800x1800 pixeles</span>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-2 col-md-offset-3">
									<input type="button" value="A C E P T A R" id="locutoresAddFormBtn" class="btn btn-primary" <?php echo $disabled; ?> />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>

<?php Utils::getFooterAdmin(); ?>
<script>
$(document).ready(function(){
  let cfg = {
    "idForm": "locutoresAddForm",
    "validExclude": ["name1", "name2", "ap", "am", "facebook"]
  };
	Form_.atOnInitAdd(cfg);
});
</script>
</body>
</html>