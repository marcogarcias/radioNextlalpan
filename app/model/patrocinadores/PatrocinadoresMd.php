<?php
//$serv = $_SERVER['DOCUMENT_ROOT'];
//$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
//$pathFile = $pathFile.'/app/paths.php';
//require_once $pathFile;
if($_SERVER['SERVER_NAME'] == "localhost")
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}/radioNextlalpan");
else
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}");

require_once ROOT_PATH.'/app/Model.php';
//require_once '../app/Model.php';

class PatrocinadoresMd extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function addPatrocinadores($reg=null, $closeConex=true){
		$closeConex = $closeConex ? $this->_db : false;
		$res = false;
		if(is_array($reg)){
			$res = $this->insert($reg, 'patrocinadores');
		}
		$this->close(null, $closeConex);
		return $res;
	}
	/**
	  * obtiene el registro de un patrocinador en espećífico de acuerdo a su id, o de varios de acuerdo al filtro
	  * @param int $idPatrocinador indica el id del patrocinador del cual se quiere recuperar los datos
	  * @param String $cols indica las columnas a mostrar
	  * @param String $filter indica el filtro que se quiere hacer en la consulta
	  * @param int $assoc indica si se quiere retornar un array associativo indicando el key que se quiere
	  * @param Boollean $closeConex indica si se quiere cerrar la conexión
	  */
	public function getPatrocinadores($idPatrocinador=null, $cols=null, $filter='', $assoc=false, $closeConex=true){
		$cols = $cols ? $cols : 'p.*';
		$res = array();
		$closeConex = $closeConex ? $this->_db : false;
		$filter.= $idPatrocinador ? ' AND p.idPatrocinadores='.$idPatrocinador : '';
		$query = 'SELECT '.$cols.' 
				FROM patrocinadores p 
				LEFT JOIN estados e ON e.idEstado=p.estado
				LEFT JOIN municipios m ON m.idMunicipio=p.municipio
				WHERE p.isDelete=0 '.$filter;
		if($result = $this->_db->query($query)){
			$res = Utils::sqlToArray($result, $assoc);
		}
		$this->close($result, $closeConex);
		return $res;
	}

	public function updatePatrocinador($fields = array(), $where=null, $closeConex=true){
		$res = false;
		$closeConex = $closeConex ? $this->_db : false;
		if(is_array($fields) && count($fields) && $where){
			$res = $this->getPatrocinadores(null, 'p.idPatrocinadores', $where, false, false);
			if(is_array($res) && count($res)){
				unset($res);
				$res = $this->update($fields, 'patrocinadores', $where);
			}
			$this->close(null, $closeConex);
			return $res;
		}
	}

	public function deletePatrocinador($id=null, $closeConex=true){
		$res = false;
		if($id){
			$fields = array('isDelete'=>1);
			$where = ' AND idPatrocinadores='.$id;
			return self::updatePatrocinador($fields, $where, $closeConex);
		}
	}
}
?>