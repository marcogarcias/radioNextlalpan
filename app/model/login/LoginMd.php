<?php
require_once '../../app/Model.php';

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

	public function getUsers($idUser=null, $cols='usr.*', $filter=''){
		$res = false;
		$filter.= $idUser ? ' AND usr.idUser='.$idUser : '';
		$cols = $cols ? $col : 'usr.*';
		$query = 'SELECT '.$cols.' FROM usuarios usr WHERE usr.isDelete=0 '.$filter;
		if($result = $this->_db->query($query)){
			$res = $result->fetch_assoc();
			$result->close();
		}
		$this->close($result, $this->_db);
		return $res;
	}
}
?>