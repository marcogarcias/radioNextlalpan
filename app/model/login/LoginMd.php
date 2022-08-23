<?php
//$serv = $_SERVER['DOCUMENT_ROOT'];
//$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
//$pathFile = $pathFile.'/app/paths.php';
//require_once $pathFile;

if($_SERVER['SERVER_NAME'] == "localhost"){
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}/radioNextlalpan");
}else{
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}");
}
require_once ROOT_PATH.'/app/Model.php';

class LoginMd extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function checkUserLoginMd($email=null, $filter=''){
		$res = false;
		$filter.= $email ? 'AND usr.email="'.$email.'"' : '';
		$res = self::getUsers(null, null, $filter);
		return $res;
	}

	public function getUsers($idUser=null, $cols='usr.*, gru.*', $filter=''){
		$res = false;
		$filter.= $idUser ? ' AND usr.idUser='.$idUser : '';
		$colsDef = 'usr.idUser, usr.nombre, usr.ap, usr.am, usr.email, usr.password, usr.permisos, gru.grupo AS gru_grupo, gru.permisos AS gru_permisos';
		$cols = $cols ? $col : $colsDef;
		$query = 'SELECT '.$cols.' 
			FROM usuarios usr 
			LEFT JOIN grupos gru 
			ON usr.grupo = gru.idGrupo
			WHERE usr.isDelete=0 '.$filter;
		if($result = $this->_db->query($query)){
			$res = $result->fetch_assoc();
			//$result->close();
		}
		$this->close($result, $this->_db);
		return $res;
	}
}
?>