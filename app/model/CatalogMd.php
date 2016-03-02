<?php
//header("Content-Type: text/html;charset=utf-8");
require_once '../../app/Model.php';

class CatalogMd extends Model{
	public function __construct(){
		parent::__construct();
	}

	/**
	 * retorna los datos de uno o todos los estados 
	 * @param int $idEstado indica el id del estado a buscar. Se retornarán los datos de ese registro
	 * @param String $cols indica las columnas a returnar, si no se especifica retorna todas
	 * @param String $filter indica el filtro que se quiere aplicar a la consulta
	 * @param String $assoc indica si se quiere retornar la consulta en forma de array numérico o associativo.
	 *		Si es asociativo se indica en esta variable que columna será el índice del array
	 *
	 */
	public function getEstados($idEstado=null, $cols=null, $filter='', $assoc=false){
		$cols = $cols ? $cols : '*';
		$res = array();
		$filter.= $idEstado ? ' AND idEstado='.$idEstado : '';
		$query = 'SELECT '.$cols.' FROM estados WHERE isDelete=0'.$filter;
		if($result = $this->_db->query($query)){
			$res = Utils::sqlToArray($result, $assoc);
			$result->close();
		}
		$this->close($result, $this->_db);
		return $res;
	}

	/**
	 * retorna los municipios de un estado en específico
	 * @param int $idEstado indica el id del estado a buscar. Se retornarán los datos de ese registro
	 * @param String $cols indica las columnas a returnar, si no se especifica retorna todas
	 * @param String $filter indica el filtro que se quiere aplicar a la consulta
	 * @param String $assoc indica si se quiere retornar la consulta en forma de array numérico o associativo.
	 *		Si es asociativo se indica en esta variable que columna será el índice del array
	 *
	 */
	public function getMunicipiosByEstado($idEstado=null, $cols=null, $assoc=false){
		$cols = $cols ? $cols : '*';
		$res;
		$filter.= $idEstado ? ' AND idEstado='.$idEstado : '';
		$res = self::getMunicipios(null, $cols, $filter, $assoc);
		return $res;
	}

	/**
	 * retorna los datos de uno o todos los municipios o bien los municipios de un estado 
	 * @param int $idMunicipio indica el id del municipio a buscar. Se retornarán los datos de ese registro
	 * @param String $cols indica las columnas a returnar, si no se especifica retorna todas
	 * @param String $filter indica el filtro que se quiere aplicar a la consulta
	 * @param String $assoc indica si se quiere retornar la consulta en forma de array numérico o associativo.
	 *		Si es asociativo se indica en esta variable que columna será el índice del array
	 *
	 */
	public function getMunicipios($idMunicipio=null, $cols=null, $filter='', $assoc=false){
		$cols = $cols ? $cols : '*';
		$res = array();
		$filter.= $idMunicipio ? ' AND idMunicipio='.$idMunicipio : '';

		$query = 'SELECT '.$cols.' FROM municipios WHERE isDelete=0'.$filter;
		if($result = $this->_db->query($query)){
			$res = Utils::sqlToArray($result, $assoc);
			$result->close();
		}
		$this->close($result, $this->_db);
		return $res;
	}
}
?>