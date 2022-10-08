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

$func = isset($_POST['func']) && $_POST['func'] ? $_POST['func'] : 'sinDefinir';

goFunction($func);

/**
 * llama a la función que se ha pedido en el índice "func"
 *
 */
function goFunction($func){
	switch ($func) {
		case 'getMunicipiosOptions':
		$idEst = isset($_POST['param1']) ? $_POST['param1'] : null;
		$idMun = isset($_POST['param2']) ? $_POST['param2'] : null;
			$json = getMunicipiosOptions($idEst, $idMun);
			break;

		case 'updateOrderSlider1':
			$json = updateOrderSlider1($_POST['param1'], $_POST['param2']);
			break;

		case 'deletePatrocinador':
			$idPatr = isset($_POST['param1']) ? $_POST['param1'] : null;
			$json = deletePatrocinador($idPatr);
			break;
        
    case 'deleteLocutor':
      $idPatr = isset($_POST['param1']) ? $_POST['param1'] : null;
      $json = deleteLocutor($idPatr);
      break;	
	
		default:
			$json = sinDefinir();
			break;
	}

	$json = json_encode($json);
	echo $json;
	exit();
}

function getMunicipiosOptions($idEstado, $idMunicipio=null){
	$municipios = getMunicipios($idEstado);
	$options = Utils::getSelectOptions($municipios, null, 'municipio', $idMunicipio);
	return $options;
}

function getMunicipios($idEstado){
	require_once ROOT_PATH.'/app/Utils.php';
	require_once ROOT_PATH.'/app/model/CatalogMd.php';
	$catalog = new CatalogMd();
	$municipios = $catalog->getMunicipiosByEstado($idEstado, null, 'idMunicipio'); // array('uno'=>$idEstado);
	//$municipios = array('res'=>getcwd());
	unset($catalog);
	return $municipios;
}

/**
  * cambia el orden en la base de datos en que aparecerá 
  * en el slider1 de los patrocinadores
  *
  */
function updateOrderSlider1($id=0, $order=0){
	$id = intval($id);
	$order = intval($order);
	if($id && $order){
		require_once ROOT_PATH.'/app/Utils.php';
		require_once ROOT_PATH.'/app/controller/patrocinadores/PatrocinadoresCtrl.php';
	
		$patr = new PatrocinadoresCtrl();
		$res = $patr->updateOrderSlider1($id, $order); // array('uno'=>$idEstado);
		return $res;
	}
}

/**
  * elimina (logicamente) de la base de datos al patrocinador dado
  * @param Int $idPatr indica el id del patrocinador a eliminar
  */
function deletePatrocinador($idPatr=0){
	$idPatr = intval($idPatr);
	if($idPatr){
		require_once ROOT_PATH.'/app/Utils.php';
		require_once ROOT_PATH.'/app/controller/patrocinadores/PatrocinadoresCtrl.php';
	
		$patr = new PatrocinadoresCtrl();
		$res = $patr->deletePatrocinador($idPatr);
		//$res = array('res'=>$res);
		return $res;
	}
}

/**
  * elimina (logicamente) de la base de datos al patrocinador dado
  * @param Int $idPatr indica el id del patrocinador a eliminar
  */
function deleteLocutor($idLocutor=0){
  $idLocutor = intval($idLocutor);
  if($idLocutor){
    require_once ROOT_PATH.'/app/Utils.php';
    require_once ROOT_PATH.'/app/controller/locutores/LocutoresCtrl.php';

    $locut = new LocutoresCtrl();
    $res = $locut->deleteLocutor($idLocutor);
    //$res = array('res'=>$res);
    return $res;
  }
}

function sinDefinir(){
	return array('res'=>'función sin definir');
}

?>