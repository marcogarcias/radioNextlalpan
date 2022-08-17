<?php
require_once 'app/Model.php';

class SliderMd extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function getImgsMd($id=null, $cols=null, $filter=''){
		$filter.= $id ? 'AND gd.idImg='.$id : '';
		$cols = $cols ? $cols : 'gd.*';
		$query = 'SELECT '.$cols.' FROM galeriaDinamica01 gd WHERE gd.isDelete=0 ';
		if($result = $this->_db->query($query)){
			//$imgs = $result->fetch_all(MYSQLI_NUM);
			$imgs = $result->fetch_assoc();
			$result->close();
		}else $imgs='Ha ocurrido un error en la consulta.';
		$this->close($result, $this->_db);
		return $imgs;
	}
}
?>