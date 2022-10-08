<?php

if($_SERVER['SERVER_NAME'] == "localhost"){
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}/radioNextlalpan");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}/radioNextlalpan");
}else{
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}");
}

require_once ROOT_PATH."/app/Model.php";
//require_once '../app/Model.php';

class LocutoresMd extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function addLocutores($reg=null, $closeConex=true){
		$closeConex = $closeConex ? $this->_db : false;
		$res = false;
		if(is_array($reg)){
			$res = $this->insert($reg, "locutores");
		}
		$this->close(null, $closeConex);
		return $res;
	}
	/**
	  * obtiene el registro de un locutor en espećífico de acuerdo a su id, o de varios de acuerdo al filtro
	  * @param int $id Indica el id del locutor del cual se quiere recuperar los datos
	  * @param String $cols indica las columnas a mostrar
	  * @param String $filter indica el filtro que se quiere hacer en la consulta
	  * @param int $assoc indica si se quiere retornar un array associativo indicando el key que se quiere
	  * @param Boollean $closeConex indica si se quiere cerrar la conexión
	  */
	public function getLocutores($id=null, $cols=null, $filter='', $assoc=false, $closeConex=true){
		$cols = $cols ? $cols : "l.*";
		$res = array();
		$closeConex = $closeConex ? $this->_db : false;
		$filter.= $id ?  " AND l.idLocutor={$id}" : '';
		$query = "SELECT {$cols} 
				FROM locutores l 
				WHERE l.isDelete=0 {$filter}";
		if($result = $this->_db->query($query)){
			$res = Utils::sqlToArray($result, $assoc);
		}
		$this->close($result, $closeConex);
		return $res;
	}

	public function updateLocutor($fields = array(), $where=null, $closeConex=true){
		$res = false;
		$closeConex = $closeConex ? $this->_db : false;
		if(is_array($fields) && count($fields) && $where){
			$res = $this->getLocutores(null, "l.idLocutor", $where, false, false);
			if(is_array($res) && count($res)){
				unset($res);
				$res = $this->update($fields, "locutores", $where);
			}
			$this->close(null, $closeConex);
			return $res;
		}
	}

	public function deleteLocutor($id=null, $closeConex=true){
		$res = false;
		if($id){
			$fields = array("isDelete"=>1);
			$where = " AND idLocutor={$id}";
			return self::updateLocutor($fields, $where, $closeConex);
		}
	}
}
?>