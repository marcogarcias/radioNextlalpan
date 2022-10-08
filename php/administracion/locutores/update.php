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
require_once $appPath.'/model/CatalogMd.php';
require_once $ctrlPath.'/login/LoginCtrl.php';
require_once $ctrlPath.'/locutores/LocutoresCtrl.php';
$loginCtrl = new LoginCtrl();

if(isset($_POST['idLocut']) && $_POST['idLocut']){
	$locutores = new LocutoresCtrl();
	$locutores->updateLocutores($_POST, $_FILES);
	die('...');
}else
	$loginCtrl->checkActiveSessionCtrl('login');

// verificar los permisos que tiene el usuario por comparación bitwise
$disabled = ($_SESSION['grupoPermisos'] & 4) ? '' : 'disabled';

$error = isset($_SESSION["resSubmit"]['error']) ? $_SESSION["resSubmit"]['error'] : null;
$hide = $error ? '' : 'hide';
$msg = isset($_SESSION["resSubmit"]['msg']) ? $_SESSION["resSubmit"]['msg'] : null;

// extrayendo los datos del registro elegido de acuerdo a su id
$locut = new LocutoresCtrl();
$id = $_GET['locut'];
$data = $locut->getAllLocutores($id);
$data = isset($data[$id]) ? $data[$id] : null;
$urlImg = ROOT_PATH.'/'.$data['path'].'/'.$data['image'];
$imgExist = is_file($urlImg);


if(!is_array($data) && !count($data))
	header('location: ' .'List.php');

Utils::headPageAdmin();
?>

<body>
<?php 
Utils::getHeaderAdmin('RADIO NEXTLALPAN - management');
Utils::getNavAdmin('locutores', 'add');
?>

<section>
	<article>
<?php Utils::getUserDataAdmin(); ?>
	</article>

	<article>
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				<div class="panel panel-primary" id="addPanel">
					<div class="panel-heading"><strong>Actualizar locutor</strong></div>
					<div class="panel-body">
						<form name="login" method="post" class="form-horizontal" id="locutoresAddForm" enctype="multipart/form-data">
							<div class="alert alert-<?php echo $error.' '.$hide; ?>" role="alert">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								<?php echo $msg; ?>
							</div>
							
							<div class="form-group has-feedback" id="name1-group">
								<div class="col-md-12">
									<label for="name1" class="control-label">Nombre: </label>
									<input type="text" name="name1" id="name1" class="form-control" value="<?php echo $data['nombre']; ?>" placeholder="Nombre" data-notnull="0" <?php echo $disabled; ?> />
									<span id="name1-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="name1-help-block" class="help-block"></span>
								</div>
							</div>

              <div class="form-group has-feedback" id="name2-group">
								<div class="col-md-12">
									<label for="name2" class="control-label">Segundo nombre: </label>
									<input type="text" name="name2" id="name2" class="form-control" value="<?php echo $data['nombre2']; ?>" placeholder="Segundo nombre" data-notnull="0" <?php echo $disabled; ?> />
									<span id="name2-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="name2-help-block" class="help-block"></span>
								</div>
							</div>

              <div class="form-group has-feedback" id="ap-group">
								<div class="col-md-12">
									<label for="ap" class="control-label">Apellido paterno: </label>
									<input type="text" name="ap" id="ap" class="form-control" value="<?php echo $data['ap']; ?>" placeholder="Apellido paterno" data-notnull="0" <?php echo $disabled; ?> />
									<span id="ap-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="ap-help-block" class="help-block"></span>
								</div>
							</div>

              <div class="form-group has-feedback" id="am-group">
								<div class="col-md-12">
									<label for="am" class="control-label">Apellido materno: </label>
									<input type="text" name="am" id="am" class="form-control" value="<?php echo $data['am']; ?>" placeholder="Apellido materno" data-notnull="0" <?php echo $disabled; ?> />
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
								</div>
							</div>

							<div class="checkbox <?php echo $imgExist ? '' : 'disabled'; ?>">
								<label>
									<input type="checkbox" name="sliderVisible" id="sliderVisible" value="true" <?php echo $data['sliderVisible'] ? 'checked' : ''; echo $imgExist ? '' : 'disabled'; ?>> Activar en el Slider
								</label>
							</div>

							<input type="hidden" name="idLocut" value="<?php echo $id; ?>" />
							<input type="hidden" name="urlImg" value="<?php echo $urlImg; ?>" />

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
	//Form_.atOnInitPatrocinadorAdd('patrocinadoresAddForm');
  let cfg = {
    "idForm": "locutoresAddForm",
    "validExclude": ["name1", "name2", "ap", "am", "facebook"]
  };
	Form_.atOnInitAdd(cfg);

	var imgExist = <?php echo $imgExist ? 1 : 0; ?>;
	if(!imgExist){
		$('#logo', '#locutoresAddForm').on('change', function(){
			var check = $('#sliderVisible', '#locutoresAddForm');
			var div = $('.checkbox', '#locutoresAddForm');
			if($(this).val()){
				check.attr('disabled', false);
				div.removeClass('disabled');
			}else{
				check.attr('disabled', true);
				div.addClass('disabled');
			}
		});
	}

});
</script>
</body>
</html>
