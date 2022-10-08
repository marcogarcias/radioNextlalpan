<?php

if($_SERVER['SERVER_NAME'] == "localhost"){
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}/radioNextlalpan");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}/radioNextlalpan");
}else{
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}");
}
require_once ROOT_PATH.'/app/model/locutores/LocutoresMd.php';

class LocutoresCtrl{
	public $model;
	public $pathPublic;

	public function __construct(){
		$this->model = new LocutoresMd();
		$this->pathPublic = 'public/img/locutores';
	}
/**
  * agrega un nuevo registro en la tabla de locutores y si
  * se ha subido un archivo lo mueve a la carpeta de los locutores
  *
  */
	public function addLocutores($post = null, $file=null){
		if($post){
			// insertando datos de locutor en la tabla 'locutores' de la bd
			$locutor = array(
				'nombre'=> Utils::getIndexPost($post, 'name1'),
        'nombre2'=> Utils::getIndexPost($post, 'name2'),
        'ap'=> Utils::getIndexPost($post, 'ap'),
        'am'=> Utils::getIndexPost($post, 'am'),
				'register'=> date('Y-m-d H:i:s')
			);

			// comprobando si se subió alguna imagen del logo del locutor
			$file_ = isset($file['image']) && $file['image'] ? $file['image'] : null;
			$dirTo = ROOT_PATH.'/public/img/locutores';
			$rules =array('formats'=>'image/jpeg', 'sizeMaxKb'=>2048, 'dimensionsMin'=>'200|200', 'dimensionsMax'=>'1800|1800', 'resize'=>'800|600');
			$resFile = Utils::updateFile($file_, $dirTo, $rules);
			$success = (isset($resFile['res']) && $resFile['res']==1 && isset($resFile['success']) && is_array($resFile['success'])) ? $resFile['success'] : false;
			$msn = isset($resFile['resMsg']) ? $resFile['resMsg'] : null;
			$lastSlider = self::lastOrderSlider(false);

			$locutor['path'] = $this->pathPublic;
			$locutor['image'] = $success ? $success['name'] : null;
			$locutor['sliderOrder'] = $success && Utils::getIndexPost($post, 'sliderVisible') ? ++$lastSlider : 0;
			$locutor['sliderVisible'] = $success && Utils::getIndexPost($post, 'sliderVisible') ? 1 : 0;
			$res = $this->model->addLocutores($locutor);

			$error = $success && $res ? 'success' : 'warning';
			$msn1 = $res ? 'El locutor se dió de alta correctamente.' : 'Ocurrió un problema. El locutor no se registró correctamente.';
			$msn2 = isset($resFile['resMsg']) && $resFile['resMsg'] ? $resFile['resMsg'] : null;
			$icon = $success && $res ? 'ok' : 'remove'; 
			$_SESSION["resSubmit"] = array('error' => $error, 'msg'=>$msn1.'<br />'.$msn2, 'icon'=>$icon);
			header('location: ' .'List.php');
		}
		return get_defined_vars ();
	}

	/**
	 * retorna el último orden que hay en el slider de locutores
	 *
	 */
	public function lastOrderSlider($closeConex = true){
		$cols = 'max(l.sliderOrder) AS lastOrder';
		$filter = 'AND l.sliderVisible=1';
		$lastOrder = self::getImgsSlider1Actives(null, $cols, $filter, false, $closeConex);
		$lastOrder = isset($lastOrder[0]) ? $lastOrder[0] : false;
		$lastOrder = isset($lastOrder['lastOrder']) ? $lastOrder['lastOrder'] : 1;		
		return intVal($lastOrder);
	}

	public function updateLocutores($post = null, $file=null){
		if($post){
			$idLocut = intVal(Utils::getIndexPost($post, 'idLocut'));
			$visible = Utils::getIndexPost($post, 'sliderVisible');
			$urlImg = Utils::getIndexPost($post, 'urlImg');
			//unlink($urlImg);
			//die();
			// insertando datos del locutor en la tabla 'locutores' de la bd
			$locutor = array(
        'nombre'=> Utils::getIndexPost($post, 'name1'),
        'nombre2'=> Utils::getIndexPost($post, 'name2'),
        'ap'=> Utils::getIndexPost($post, 'ap'),
        'am'=> Utils::getIndexPost($post, 'am'),
        'sliderVisible'=> $visible ? 1 : 0,
        'register'=> date('Y-m-d H:i:s')
      );

			// comprobando si se subió alguna imagen del logo del locutor
			$file_ = isset($file['image']) && $file['image'] ? $file['image'] : null;
			$changeImage = is_file($file_['tmp_name']);
			if($changeImage){
				$dirTo = ROOT_PATH.'/public/img/locutores';
				$rules =array('formats'=>'image/jpeg', 'sizeMaxKb'=>2048, 'dimensionsMin'=>'200|200', 'dimensionsMax'=>'1800|1800', 'resize'=>'800|600');
				$resFile = Utils::updateFile($file_, $dirTo, $rules);
				$success = (isset($resFile['res']) && $resFile['res']==1 && isset($resFile['success']) && is_array($resFile['success'])) ? $resFile['success'] : false;

				$locutor['path'] = $this->pathPublic;
				$locutor['image'] = $success ? $success['name'] : null;

				// si se subió una nueva imagen se borra la que se tenía
				if($success && is_file($urlImg)) unlink($urlImg);
			}

			$locutor['sliderVisible'] = Utils::getIndexPost($post, 'sliderVisible') ? 1 : 0;

			$res = $this->model->updateLocutor($locutor, 'AND idLocutor='.$idLocut, false);

			$error = $success && $res ? 'success' : 'warning';
			$msn1 = $res ? 'Los datos del locutor se actualizaron correctamente.' : 'Ocurrió un problema. Los datos del locutor no se actualizaron correctamente.';
			$msn2 = isset($resFile['resMsg']) && $resFile['resMsg'] ? $resFile['resMsg'] : null;
			$icon = $success && $res ? 'ok' : 'remove'; 
			$_SESSION["resSubmit"] = array('error' => $error, 'msg'=>$msn1.'<br />'.$msn2, 'icon'=>$icon);

			header('location: ' .'List.php');
		}
		return get_defined_vars ();
	}

	public function getAllLocutores($id=null){
		$cols = 'l.idLocutor, l.nombre, l.nombre2, l.ap, l.am, l.path, l.image, l.sliderVisible, l.register' ;
		$res = $this->model->getLocutores($id, $cols, null, 'idLocutor');
		return $res;
	}

	public function getImgsSlider1Actives($id=null, $cols=null, $filter='', $assoc=false, $closeConex=false){
		$imgs = $this->model->getLocutores(null, $cols, $filter, $assoc=false, $closeConex=false);
		return $imgs;
	}


	public function getTableLocutores($list=array()){
		$table = "";
    if(count($list)){
			// verificar los permisos que tiene el usuario por comparación bitwise
			$permisos = $_SESSION['grupoPermisos'];
			$btnUp; 
			$btnDel;
			$table='
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover" id="listLocutores">
						<thead><tr>
							<th>Nombre</th>
							<th>Slider</th>
							<th>Imagen</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr></thead>
						<tbody>';
			
			foreach ($list as $k => $v) {
				// verificar los permisos que tiene el usuario por comparación bitwise
				$btnUp = $permisos & 4 ? '<a href="'.URL_PATH.'/php/administracion/locutores/update.php?locut='.$k.'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' : 'N/A';
				$btnDel = $permisos & 8 ? '<a href="#" class="delete" data-idlocut="'.$k.'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>' : 'N/A';
				$img = is_file(ROOT_PATH.'/'.$v['path'].'/'.$v['image']) ? '<img src="'.URL_PATH.'/'.$v['path'].'/'.$v['image'].'" width="150" height="100" />' : 'sin imagen';
				$slider = intval($v['sliderVisible']) ? 'Si' : 'No';
				$table.='
					<tr>
						<td>'.$v['nombre'].'</td>
						<td>'.$slider.'</td>
						<td>'.$img.'</td>
						<td style="text-align:center;">'.$btnUp.'</td>
						<td style="text-align:center;">'.$btnDel.'</td>
					</tr>'; 
			}
			$table.='</tbody></table></div>';
		}
		return $table;
	}
	/**
	  * actualiza los datos de un locutor
	  *
	  **/
	public function updateOrderSlider1($id=0, $order=0){
		$id = intval($id);
		$order = intval($order);
		if($id && $order){		
			$fields = array('sliderOrder'=>$order);
			$where = ' AND idLocutores='.$id;
			$res = $this->model->updateLocutor($fields, $where); // array('uno'=>$idEstado);
			return $res;
		}
	}

	/**
	  * elimina (logicamente) al locutor dado
	  * @param Int $id indica el id del locutor a eliminar
	  **/
	public function deleteLocutor($id=0){
		$id = intval($id);
		if($id){		
			$res = $this->model->deleteLocutor($id);
			$_SESSION["resSubmit"] = array('error' => 1, 'msg'=>'El locutor fue eliminado correctamente.', 'icon'=>'ok');
			return $res;
		}
	}
}
?>