<?php
require_once 'app/model/slider/SliderMd.php';

class SliderCtrl{
	public $model;

	public function __construct(){
		$this->model = new SliderMd();
	}

	public function getAllImgsCtrl(){
		$imgs = $this->model->getImgsMd();
		return $imgs;
	}
}
?>