<?php session_start(); ?>
<?php
$serv = $_SERVER['DOCUMENT_ROOT'];
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
// verificar los permisos que tiene el usuario por comparación bitwise
$view = ($_SESSION['grupoPermisos'] & 1);

$list = $patr->getAllPatrocinadores();
$table = $view ? $patr->getTablePatrocinadores($list) : 'No tienes permisos para visualizar los datos.';
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
	$('.delete').on('click', function(e){
		e.preventDefault();
		console.log('oko');
		var id = $(this).data('idpatr');
		$.ajax({
			dataType: "json",
			data: {'func':'deletePatrocinador', 'param1':id},
			url:   'ajaxAdmin.php',
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