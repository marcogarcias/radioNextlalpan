<?php
$serv = $_SERVER['DOCUMENT_ROOT'].'/dominios/radionextlalpan';
$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
$pathFile = $pathFile.'/app/paths.php';
require_once $pathFile;
require_once PATH.'/app/model/patrocinadores/PatrocinadoresMd.php';
//require_once '../app/model/patrocinadores/PatrocinadoresMd.php';

class PatrocinadoresCtrl{
	public $model;
	public $pathPublic;

	public function __construct(){
		$this->model = new PatrocinadoresMd();
		$this->pathPublic = 'public/img/patrocinadores';
	}
/**
  * agrega un nuevo registro en la tabla de patrocinadores y si
  * se ha subido un archivo lo mueve a la carpeta de los patrocinadores
  *
  */
	public function addPatrocinadores($post = null, $file=null){
		if($post){
			// insertando datos de patrocinador en la tabla 'patrocinadores' de la bd
			$patrocinador = array(
				'nombre'=> Utils::getIndexPost($post, 'patrocinador'),
				'estado'=> intVal(Utils::getIndexPost($post, 'estado')),
				'municipio'=> intVal(Utils::getIndexPost($post, 'municipio')),
				'colonia'=> Utils::getIndexPost($post, 'colonia'),
				'calle'=> Utils::getIndexPost($post, 'calle'),
				'numero'=> Utils::getIndexPost($post, 'numero'),
				'cp'=> intVal(Utils::getIndexPost($post, 'cp')),
				'referencias'=> Utils::getIndexPost($post, 'referencias'),
				'telefono'=> Utils::getIndexPost($post, 'telefono'),

				'movil'=> Utils::getIndexPost($post, 'movil'),
				'web'=> Utils::getIndexPost($post, 'web'),
				'facebook'=> Utils::getIndexPost($post, 'facebook'),
				'twitter'=> Utils::getIndexPost($post, 'twitter'),
				'dateRegister'=> date('Y-m-d')
			);

			// comprobando si se subió alguna imagen del logo del patrocinador
			$file_ = isset($file['logo']) && $file['logo'] ? $file['logo'] : null;
			$dirTo = '../../public/img/patrocinadores';
			$rules =array('formats'=>'image/jpeg|image/png|image/gif', 'sizeMaxKb'=>2048);
			$resFile = Utils::updateFile($file_, $dirTo, $rules);
			$success = (isset($resFile['res']) && $resFile['res']==1 && isset($resFile['success']) && is_array($resFile['success'])) ? $resFile['success'] : false;
			$patrocinador['logoUrl'] = $this->pathPublic;
			$patrocinador['logoName'] = $success ? $success['name'] : null;
			$patrocinador['logoSize'] = $success ? $success['size'] : 0;
			$patrocinador['sliderOrder'] = 0;
			$patrocinador['sliderVisible'] = 0;

			$res = $this->model->addPatrocinadores($patrocinador);
			
			header('location: ' .'index.php');
		}
		return get_defined_vars ();
	}

	public function updatePatrocinadores($post = null, $file=null){
		if($post){
			$idPatr = intVal(Utils::getIndexPost($post, 'idPatr'));
			$visible = Utils::getIndexPost($post, 'sliderVisible');
			// insertando datos de patrocinador en la tabla 'patrocinadores' de la bd
			$patrocinador = array(
				'nombre'=> Utils::getIndexPost($post, 'patrocinador'),
				'estado'=> intVal(Utils::getIndexPost($post, 'estado')),
				'municipio'=> intVal(Utils::getIndexPost($post, 'municipio')),
				'colonia'=> Utils::getIndexPost($post, 'colonia'),
				'calle'=> Utils::getIndexPost($post, 'calle'),
				'numero'=> Utils::getIndexPost($post, 'numero'),
				'cp'=> intVal(Utils::getIndexPost($post, 'cp')),
				'referencias'=> Utils::getIndexPost($post, 'referencias'),
				'telefono'=> Utils::getIndexPost($post, 'telefono'),

				'movil'=> Utils::getIndexPost($post, 'movil'),
				'web'=> Utils::getIndexPost($post, 'web'),
				'facebook'=> Utils::getIndexPost($post, 'facebook'),
				'twitter'=> Utils::getIndexPost($post, 'twitter'),
				'sliderVisible'=> $visible ? 1 : 0,
				'dateRegister'=> date('Y-m-d')
			);

			// comprobando si se subió alguna imagen del logo del patrocinador
			//$file_ = isset($file['logo']) && $file['logo'] ? $file['logo'] : null;
			//$dirTo = '../../public/img/patrocinadores';
			//$rules =array('formats'=>'image/jpeg|image/png|image/gif', 'sizeMaxKb'=>2048);
			//$resFile = Utils::updateFile($file_, $dirTo, $rules);
			//$success = (isset($resFile['res']) && $resFile['res']==1 && isset($resFile['success']) && is_array($resFile['success'])) ? $resFile['success'] : false;
			//$patrocinador['logoUrl'] = $this->pathPublic;
			//$patrocinador['logoName'] = $success ? $success['name'] : null;
			//$patrocinador['logoSize'] = $success ? $success['size'] : 0;
			//$patrocinador['sliderOrder'] = 0;
			//$patrocinador['sliderVisible'] = 0;
			$res = $this->model->updatePatrocinador($patrocinador, 'AND idPatrocinadores='.$idPatr, false);
			header('location: ' .'patrocinadoresUpdate.php');
		}
		return get_defined_vars ();
	}

	public function getAllPatrocinadores($id=null){
		$cols = 'p.idPatrocinadores, p.nombre, p.estado AS idEstado, p.municipio AS idMunicipio, e.estado, m.municipio, p.colonia, p.calle, p.numero, p.cp, p.referencias, p.telefono, p.movil, p.web, p.facebook, p.twitter, p.logoUrl, p.logoName, p.sliderVisible, p.dateRegister' ;
		$res = $this->model->getPatrocinadores($id, $cols, null, 'idPatrocinadores');
		return $res;
	}

	public function getImgsSlider1Actives($id=null, $cols=null, $filter=''){
		$imgs = $this->model->getPatrocinadores(null, $cols, $filter);
		return $imgs;
	}


	public function getTablePatrocinadores($list=array()){
		if(count($list)){
			$table='
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover" id="listPatrocinadores">
						<thead><tr>
							<th>Nombre</th>
							<th>Direcciòn</th>
							<th>Referencias</th>
							<th>Telèfono</th>
							<th>Movil</th>
							<th>Web</th>
							<th>Facebook</th>
							<th>Twitter</th>
							<th>Slider</th>
							<th>Imagen</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr></thead>
						<tbody>';
			
			foreach ($list as $k => $v) {
				$slider = intval($v['sliderVisible']) ? 'Si' : 'No';
				$table.='
					<tr>
						<td>'.$v['nombre'].'</td>
						<td>'.$v['calle'].' '.$v['numero'].' '.$v['colonia'].', '.$v['municipio'].', '.$v['estado'].', C.P.: '.$v['cp'].'</td>
						<td>'.$v['referencias'].'</td>
						<td>'.$v['telefono'].'</td>
						<td>'.$v['movil'].'</td>
						<td>'.$v['web'].'</td>
						<td>'.$v['facebook'].'</td>
						<td>'.$v['twitter'].'</td>
						<td>'.$slider.'</td>
						<td><img src="../../'.$v['logoUrl'].'/'.$v['logoName'].'" width="180" height="50" /></td>
						<td style="text-align:center;"><a href="patrocinadoresUpdate.php?patr='.$k.'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
						<td style="text-align:center;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
					</tr>'; 
			}
			$table.='</tbody></table></div>';
		}
		return $table;
	}
	/**
	  * actualiza los datos de un patrocinador
	  *
	  **/
	public function updateOrderSlider1($id=0, $order=0){
		$id = intval($id);
		$order = intval($order);
		if($id && $order){		
			$fields = array('sliderOrder'=>$order);
			$where = ' AND idPatrocinadores='.$id;
			$res = $this->model->updatePatrocinador($fields, $where); // array('uno'=>$idEstado);
			return $res;
		}
	}
}
?>