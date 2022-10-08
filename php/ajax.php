<?php

if($_SERVER['SERVER_NAME'] == "localhost"){
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}/radioNextlalpan");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}/radioNextlalpan");
}else{
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}");
}
//$serv = $_SERVER['DOCUMENT_ROOT'];
//$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
//$pathFile = $pathFile.'/app/paths.php';
//require_once $pathFile;
//require_once '../app/paths.php';

$func = isset($_POST['func']) && $_POST['func'] ? $_POST['func'] : 'sinDefinir';

goFunction($func);

/**
 * llama a la función que se ha pedido en el índice "func"
 *
 */
function goFunction($func){
	switch ($func) {
		case "getImgsPatrocinadores":
			$json = getImgsPatrocinadores();
			break;
    
    case "getImgsLocutores":
      $json = getImgsLocutores();
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
	//require_once '../app/controller/patrocinadores/PatrocinadoresCtrl.php';
	require_once ROOT_PATH.'/app/controller/patrocinadores/PatrocinadoresCtrl.php';
	//require_once '../app/Utils.php';
	require_once ROOT_PATH.'/app/Utils.php';
	$patrocinadores = new PatrocinadoresCtrl();
	$cols = 'p.logoName, p.logoUrl, p.sliderOrder';
	$filter = 'AND p.sliderVisible=1 ORDER BY p.sliderOrder ASC';
	$imgs = $patrocinadores->getImgsSlider1Actives(null, $cols, $filter);
	return $imgs;
}

/**
  * obtiene los registros de los locutores
  *
  */
  function getImgsLocutores(){
    require_once ROOT_PATH.'/app/controller/locutores/LocutoresCtrl.php';
    require_once ROOT_PATH.'/app/Utils.php';
    $loc = new LocutoresCtrl();
    $cols = 'l.image, l.path, l.sliderOrder';
    $filter = 'AND l.sliderVisible=1 ORDER BY l.sliderOrder ASC';
    $imgs = $loc->getImgsSlider1Actives(null, $cols, $filter);
    return $imgs;
  }

function sinDefinir(){
	return array('res'=>'función sin definir');
}

?>