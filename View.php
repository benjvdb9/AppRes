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
		if ($this->controller->VerifyData1() == array(0, 0, 0)) /*error*/
		{
			$this->controller->SaveData1('OUI');
			include ('./views/AppResDet.php');
		}
		else if ($this->controller->VerifyData1() == array(0, 0, 1))
		{
			$this->controller->SaveData1('NON');
			include ('./views/AppResDet.php');			
		}
		else
		{
			include ('./views/AppResIn.php');
		}
	}
	
	public function output3(){
		$this->model = $_SESSION['reservation'];
		if ($this->controller->VerifyData2() == 0)
		{
			$this->controller->SaveData2();
			include ('./views/AppResVal.php');
		}
		else
		{
			include ('./views/AppResDet.php');
		}
	}
	
	public function output4(){
		$this->model = $_SESSION['reservation'];
		
		include('./views/AppResCnf.php');
	}
}
?>