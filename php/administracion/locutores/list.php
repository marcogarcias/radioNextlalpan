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
require_once ROOT_PATH.'/app/cfg.php';

$appPath = ROOT_PATH.'/app';
$ctrlPath = ROOT_PATH.'/app/controller';

require_once $appPath.'/Utils.php';
require_once $ctrlPath.'/login/LoginCtrl.php';
require_once $ctrlPath.'/locutores/LocutoresCtrl.php';
$loginCtrl = new LoginCtrl();

// comprobando que la sesión esté activa
$loginCtrl->checkActiveSessionCtrl('login');

$locut = new LocutoresCtrl();
// verificar los permisos que tiene el usuario por comparación bitwise
$view = ($_SESSION['grupoPermisos'] & 1);

$list = $locut->getAllLocutores();
$table = $view ? $locut->getTableLocutores($list) : 'No tienes permisos para visualizar los datos.';
$error = isset($_SESSION["resSubmit"]['error']) ? $_SESSION["resSubmit"]['error'] : null;
$hide = $error ? '' : 'hide';
$msg = isset($_SESSION["resSubmit"]['msg']) ? $_SESSION["resSubmit"]['msg'] : null;
$icon = isset($_SESSION["resSubmit"]['icon']) ? $_SESSION["resSubmit"]['icon'] : null;
if(isset($_SESSION["resSubmit"]))  unset($_SESSION["resSubmit"]);;
Utils::headPageAdmin();
?>

<body>
<?php 
Utils::getHeaderAdmin('RADIO NEXTLALPAN - management');
Utils::getNavAdmin('locutores', 'listLocutores');
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
					<div class="panel-heading"><strong>Locutores registrados</strong></div>
					<div class="panel-body">
						<div class="alert alert-<?php echo $error.' '.$hide; ?>" role="alert">
							<span class="glyphicon glyphicon-<?php echo $icon; ?>" aria-hidden="true"></span>
							<?php echo $msg; ?>
						</div>
						<?php echo $table; ?>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>

<div id="ej" data-ej="ok"></div>

<?php Utils::getFooterAdmin(); ?>
<script>
$(document).ready(function(){
  let url_path = "<?php echo URL_PATH; ?>";
  let urlAjaxAdmin =`${url_path}/php/administracion/ajaxAdmin.php`;
  console.log("urlAjaxAdmin", urlAjaxAdmin);
	$('.delete').on('click', function(e){
		e.preventDefault();
		console.log('oko');
		let id = $(this).data('idlocut');
		$.ajax({
			dataType: "json",
			data: {'func':'deleteLocutor', 'param1':id},
			url:   urlAjaxAdmin,
			type:  'post',
			beforeSend: function(){
				// lo que se hará antes de mandar la petición ajax
			},
			success: function(res){
				window.location.reload();
			},
			error:    function(xhr,err){
				console.log("Ocurrio un error, intentelo nuevamente:", xhr);
			}
		});
	});
});
</script>
</body>
</html>