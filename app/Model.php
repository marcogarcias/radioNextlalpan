<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan/app/cfg.php';// 'cfg.php';

class Model{
	protected $_db;

	public function __construct(){
		$this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if($this->_db->connect_errno){
			echo 'Falló al conectar a la base de datos.';
			return;
		}

		$this->_db->set_charset("utf8");
	}

	public function close($param1=null, $param2=null){
		$param1 && ($param1->close());
		$param2 && ($param2->close());
	}

	public function insert($reg=array(), $table=null){
		$res = false;
		if(is_array($reg) && $table){
			$cols = implode(', ', array_keys($reg));
			foreach (array_values($reg) as $value){
				isset($vals) ? $vals .= ',' : $vals = '';
				$vals .= '\''.$this->_db->real_escape_string($value).'\'';
			}

			$sql = 'INSERT INTO '.$table.' ('.$cols.')  VALUES('.$vals.')';
			$res = $this->_db->real_query($sql);
			$res = $res ? $this->_db->insert_id : false;
		}
		return $res;
	}

	public function update($reg=array(), $table=null, $filter=null){
		$res = false;
		$sql = null;
		if(is_array($reg) && count($reg) && $table){
			foreach ($reg as $key => $value){
				isset($cols) ? $cols .= ',' : $cols = '';
				$cols .= $key.'=\''.$this->_db->real_escape_string($value).'\'';
			}

			$sql = 'UPDATE '.$table.' SET '.$cols.' WHERE isDelete=0 '.$filter;
			//$res = array('sql'=>$sql);;
			$res = $this->_db->query($sql);
			$res = $res ? true : false;
		}
		return $res;
	}
}
?>