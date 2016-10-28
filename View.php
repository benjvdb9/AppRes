<?php
class View {
	
	private $model;
	private $controller;
	
	public function __construct($model){
		$this->model = $model;
		$this->controller = $controller;
	}
	
	public function output1(){
		$page1 = file_get_contents ('./views/AppResIn.php');
		return $page1;
	}

	public function output2(){
		$page2 = file_get_contents ('./views/AppResDet.php');
		return AppResDet.php;
	}

	/*public function output3(){
		return AppResVal.php
	}*/

}
?>