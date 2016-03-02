<?php
require_once '../app/paths.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan/app/paths.php';

$func = isset($_POST['func']) && $_POST['func'] ? $_POST['func'] : 'sinDefinir';

goFunction($func);

/**
 * llama a la función que se ha pedido en el índice "func"
 *
 */
function goFunction($func){
	switch ($func) {
		case 'getImgsPatrocinadores':
			$json = getImgsPatrocinadores();
			break;
	
		default:
			$json = sinDefinir();
			break;
	}

	$json = json_encode($json);
	echo $json;
	exit();
}
/**
  * obtiene los registros de los patrocinadores que tienen una imagen en el Slider1
  *
  */
function getImgsPatrocinadores(){
	require_once '../app/controller/patrocinadores/PatrocinadoresCtrl.php';
	//require_once PATH.'/app/controller/patrocinadores/PatrocinadoresCtrl.php';
	require_once '../app/Utils.php';
	//require_once PATH.'/app/Utils.php';
	$patrocinadores = new PatrocinadoresCtrl();
	$cols = 'p.logoName, p.logoUrl, p.sliderOrder';
	$filter = 'AND p.sliderVisible=1 ORDER BY p.sliderOrder ASC';
	$imgs = $patrocinadores->getImgsSlider1Actives(null, $cols, $filter);
	return $imgs;
}

function sinDefinir(){
	return array('res'=>'función sin definir');
}

?>