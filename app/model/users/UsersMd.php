<?php
require_once '../../../app/Model.php';

class UsersMd extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function getUsers($id=null, $cols=null, $filter=''){
		$filter.= $id ? 'AND usr.idUser='.$id : '';
		$cols = $cols ? $cols : '*';
		$query = 'SELECT '.$cols.' FROM usuarios usr WHERE usr.isDelete=0 ';
		$result = $this->_db->query($query);
		$users = $result->fetch_all(MYSQLI_ASSOC);
		return $users;
	}
}
?>