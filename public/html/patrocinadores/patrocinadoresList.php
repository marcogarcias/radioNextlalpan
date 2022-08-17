<?php
$serv = $_SERVER['DOCUMENT_ROOT'];
$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
$pathFile = $pathFile.'/app/paths.php';
require_once $pathFile;

$appPath = PATH.'/app';
$ctrlPath = $appPath.'/controller';
require_once $appPath.'/Utils.php';
require_once $ctrlPath.'/patrocinadores/PatrocinadoresCtrl.php';

$patr = new PatrocinadoresCtrl();
$list = $patr->getAllPatrocinadores();
//Utils::echo_($list);
?>
<div class="container-fluid patrocinadoresList">
	<h2>Patrocinadores</h2>
	<hr />
	<?php
	foreach ($list as $k => $v) { ?>
		<div class="row">
			<div class="col-md-11">
				<div class="patrocinador">
					<h3><?php echo $v['nombre']; ?></h3>
					<img src="<?php echo './'.$v['logoUrl'].'/'.$v['logoName']; ?>" />
					<span><?php echo $v['calle'].' '.$v['numero'].', '.$v['colonia'].', '.$v['cp'].', '.$v['municipio'].', '.$v['estado']; ?></span>
					<span><?php echo $v['web']; ?></span>
					<span><?php echo $v['facebook']; ?></span>
					<span><?php echo $v['twitter']; ?></span>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</div>