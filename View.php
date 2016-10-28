<?php
class View {
	
	private $model;
	private $controller;
	
	public function __construct($model, $controller){
		$this->model = $model;
		$this->controller = $controller;
	}
	
	public function output1(){
		$page1 = file_get_contents ('./views/AppResIn.php');
		return $page1;
	}

	public function output2(){
		if ($this->controller->VerifyData1() == array(0, 0, 0))
		{
			$this->controller->SaveData1();
			var_dump($this->model);
			$page2 = file_get_contents ('./views/AppResVal.php');
			return $page2;
		}
		else
		{
			return '<h1>AAAAAAAAAAAAAAAAAAAAAAAAAA</h1>';
		}
	}

	/*public function output3(){
		return AppResVal.php
	}*/

}
?>