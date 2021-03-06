<?php session_start(); ?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan/app/paths.php';
$appPath = PATH.'/app';
$ctrlPath = PATH.'/app/controller';
require_once $appPath.'/Utils.php';
require_once $appPath.'/model/CatalogMd.php';
require_once $ctrlPath.'/login/LoginCtrl.php';
require_once $ctrlPath.'/patrocinadores/PatrocinadoresCtrl.php';

$loginCtrl = new LoginCtrl();

if(isset($_POST) && isset($_POST['patrocinador']) && isset($_POST['idPatr']) && $_POST['idPatr']){
	$patrocinadores = new PatrocinadoresCtrl();
	$patrocinadores->updatePatrocinadores($_POST, $_FILES);
	die('...');
}else
	$loginCtrl->checkActiveSessionCtrl('login');

$error = isset($_SESSION["resSubmit"]['error']) ? $_SESSION["resSubmit"]['error'] : null;
$hide = $error ? '' : 'hide';
$msg = isset($_SESSION["resSubmit"]['msg']) ? $_SESSION["resSubmit"]['msg'] : null;

// extrayendo los datos del registro elegido de acuerdo a su id
$patr = new PatrocinadoresCtrl();
$id = $_GET['patr'];
$data = $patr->getAllPatrocinadores($id);
$data = isset($data[$id]) ? $data[$id] : null;
if(!is_array($data) && !count($data))
	header('location: ' .'patrocinadoresList.php');

$catalog = new CatalogMd();
$estados = $catalog->getEstados(null, null, null, 'idEstado');
$options = Utils::getSelectOptions($estados, null, 'estado', $data['idEstado']);

Utils::headPageAdmin();
?>

<body>
<?php 
Utils::getHeaderAdmin('RADIO NEXTLALPAN - management');
Utils::getNavAdmin('patrocinadores', 'addPatrocinadores');
?>

<section>
	<article>
<?php Utils::getUserDataAdmin(); ?>
	</article>

	<article>
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				<div class="panel panel-primary" id="addPanel">
					<div class="panel-heading"><strong>Actualizar patrocinador</strong></div>
					<div class="panel-body">
						<form name="login" method="post" class="form-horizontal" id="patrocinadoresAddForm" enctype="multipart/form-data">
							<div class="alert alert-<?php echo $error.' '.$hide; ?>" role="alert">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								<?php echo $msg; ?>
							</div>
							
							<div class="form-group has-feedback" id="patrocinador-group">
								<div class="col-md-12">
									<label for="patrocinador" class="control-label">Nombre del patrocinador: </label>
									<input type="text" name="patrocinador" id="patrocinador" value="<?php echo $data['nombre']; ?>" class="form-control" placeholder="Nombre del patrocinador" data-notnull="1" />
									<span id="patrocinador-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="patrocinador-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="estado-group">
								<div class="col-md-12">
									<label for="estado" class="control-label">Estado: </label>
									<select id="estado" name="estado" class="form-control"><?php echo $options; ?></select>
									<span id="estado-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="municipio-group">
								<div class="col-md-12">
									<label for="municipio" class="control-label">Municipio: </label>
									<select id="municipio" name="municipio" class="form-control">
										<option value="0" selected>Elija una opción</option>
									</select>
									<span id="municipio-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="colonia-group">
								<div class="col-md-12">
									<label for="colonia" class="control-label">Colonia: </label>
									<input type="text" name="colonia" id="colonia" value="<?php echo $data['colonia']; ?>" class="form-control" placeholder="Nombre de la colonia" data-notnull="1" />
									<span id="colonia-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="colonia-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="calle-group">
								<div class="col-md-12">
									<label for="calle" class="control-label">Calle: </label>
									<input type="text" name="calle" id="calle" value="<?php echo $data['calle']; ?>" class="form-control" placeholder="Nombre de la calle" data-notnull="1" />
									<span id="calle-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="calle-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="numero-group">
								<div class="col-md-12">
									<label for="numero" class="control-label">Número: </label>
									<input type="text" name="numero" id="numero" value="<?php echo $data['numero']; ?>" class="form-control" placeholder="Número" data-notnull="1" />
									<span id="numero-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="numero-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="cp-group">
								<div class="col-md-12">
									<label for="cp" class="control-label">Código Postal: </label>
									<input type="text" name="cp" id="cp" value="<?php echo $data['cp']; ?>" class="form-control" placeholder="Código Postal" data-notnull="1" />
									<span id="cp-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="cp-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="referencias-group">
								<div class="col-md-12">
									<label for="referencias" class="control-label">Referencias: </label>
									<input type="text" name="referencias" id="referencias" value="<?php echo $data['referencias']; ?>" class="form-control" placeholder="Referencias" data-notnull="0" />
									<span id="referencias-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="referencias-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="telefono-group">
								<div class="col-md-12">
									<label for="telefono" class="control-label">Telefono: </label>
									<input type="text" name="telefono" id="telefono" value="<?php echo $data['telefono']; ?>" class="form-control" placeholder="Telefono" data-notnull="0" />
									<span id="telefono-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="telefono-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="movil-group">
								<div class="col-md-12">
									<label for="movil" class="control-label">Telefono Movil: </label>
									<input type="text" name="movil" id="movil" value="<?php echo $data['movil']; ?>" class="form-control" placeholder="Telefono Movil" data-notnull="0" />
									<span id="movil-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="movil-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="web-group">
								<div class="col-md-12">
									<label for="web" class="control-label">Página Web: </label>
									<input type="text" name="web" id="web" value="<?php echo $data['web']; ?>" class="form-control" placeholder="Dirección de página web" data-notnull="0" />
									<span id="web-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="web-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="facebook-group">
								<div class="col-md-12">
									<label for="facebook" class="control-label">Facebook: </label>
									<input type="text" name="facebook" id="facebook" value="<?php echo $data['facebook']; ?>" class="form-control" placeholder="Facebook" data-notnull="0" />
									<span id="facebook-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="facebook-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="twitter-group">
								<div class="col-md-12">
									<label for="twitter" class="control-label">Twitter: </label>
									<input type="text" name="twitter" id="twitter" value="<?php echo $data['twitter']; ?>" class="form-control" placeholder="Twitter" data-notnull="0" />
									<span id="twitter-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="twitter-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="form-group has-feedback" id="logo-group">
								<div class="col-md-12">
									<label for="logo" class="control-label">Imágen: </label>
									<input type="file" name="logo" id="logo" placeholder="Imagen" data-notnull="1" />
									<span id="logo-icon-help-block" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									<span id="logo-help-block" class="help-block"></span>
								</div>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" name="sliderVisible" value="true" <?php echo $data['sliderVisible'] ? 'checked' : '' ?>> Activar en el Slider
								</label>
							</div>

							<input type="hidden" name="idPatr" value="<?php echo $id; ?>" />

							<div class="form-group">
								<div class="col-md-2 col-md-offset-3">
									<input type="button" value="A C E P T A R" id="patrocinadorAddBtn" class="btn btn-primary" />
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
	Form_.atOnInitPatrocinadorAdd('patrocinadoresAddForm');
	$('#estado').on('change', function(e){
		var idMun = <?php echo $data['idMunicipio']; ?>;
		console.log(idMun);
		$.ajax({
			dataType: "json",
			data: {'func':'getMunicipiosOptions', 'param1':$(this).val(), 'param2':idMun},
			url:  'ajaxAdmin.php',
			type:  'post',
			beforeSend: function(){
				// lo que se hará antes de mandar la petición ajax
			},
			success: function(res){
				$('#municipio').empty();
				$('#municipio').html(res);
				//console.log(res);
			},
			error:    function(xhr,err){
				console.log("Ocurrio un error, intentelo nuevamente:", xhr);
			}
		});
	});

	$('#estado').trigger('change');
});
</script>
</body>
</html>
