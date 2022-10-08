<?php session_start(); ?>
<?php
//$serv = $_SERVER['DOCUMENT_ROOT'];
//$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
//$pathFile = $pathFile.'/app/paths.php';
//require_once $pathFile;
if($_SERVER['SERVER_NAME'] == "localhost"){
  defined("ROOT_PATH") || define("ROOT_PATH", "{$_SERVER['DOCUMENT_ROOT']}/radioNextlalpan");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}/radioNextlalpan");
}else{
  defined("ROOT_PATH") || define("ROOT_PATH", "{$_SERVER['DOCUMENT_ROOT']}");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}");
}

//require_once PATH.'/app/paths.php';
require_once ROOT_PATH.'/app/Utils.php';
require_once ROOT_PATH.'/app/controller/login/LoginCtrl.php';
$loginCtrl = new LoginCtrl();
$error = isset($_SESSION["resSubmit"]['error']) ? $_SESSION["resSubmit"]['error'] : null;
$hide = $error ? '' : 'hide';
$msg = isset($_SESSION["resSubmit"]['msg']) ? $_SESSION["resSubmit"]['msg'] : null;
if(isset($_SESSION["resSubmit"]))  unset($_SESSION["resSubmit"]);

if(isset($_POST) && isset($_POST['email']) && isset($_POST['pass'])){
	$res = $loginCtrl->checkUserLoginCtrl($_POST);
}else
	$loginCtrl->checkActiveSessionCtrl(null, 'index');
Utils::headPageAdmin();
?>
<body>

<?php Utils::getHeaderAdmin('RADIO NEXTLALPAN - management'); ?>

<section>
	<article>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary" id="loginPanel">
					<div class="panel-heading"><strong>L O G I N</strong></div>
					<div class="panel-body">
						<form name="login" method="post" class="form-horizontal" id="loginForm">
							<div class="alert alert-<?php echo $error.' '.$hide; ?>" role="alert">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								<?php echo $msg; ?>
							</div>
							
							<div class="form-group has-feedback" id="email-group">
								<div class="col-md-12">
									<label for="email" class="control-label">Correo electr&oacute;nico: </label>
									<input type="text" name="email" id="email" class="form-control" placeholder="correo electr&oacute;nico" data-type="email" data-notnull="1" />
									<span id="email-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="email-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="pass-group">
								<div class="col-md-12">
									<label for="pass" class="control-label">Contrase&ntilde;a: </label>
									<input type="password" name="pass" id="pass" class="form-control" placeholder="contrase&ntilde;a" data-type="password" data-notnull="1" />
									<span id="pass-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="pass-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-2 col-md-offset-3">
									<input type="button" value="A C E P T A R" id="loginBtn" class="btn btn-primary" />
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
	Form_.atOnInitLogin('loginForm');
});
</script>
</body>
</html>