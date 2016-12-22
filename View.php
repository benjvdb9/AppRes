<?php
class View {
	
	private $model;
	private $controller;
	
	public function __construct($model, $controller){
		$this->model = $model;
		$this->controller = $controller;
	}
	
	public function output1(){
		include('./views/AppResIn.php');
	}

	public function output2(){
		$this->model = $_SESSION['reservation'];
		
		if ($this->controller->NoInput1() == 0) //if there is no new input
		{
			if ($this->controller->ExistingData()[0] == 0) //Go to the next page if data exists
				{include ('./views/AppResDet.php');}
			else
				{include ('./views/AppResIn.php');}        //Else reset page
		}
		else //if there is new input
		{
			$checkdata = $this->controller->VerifyData1();
			if ($checkdata == array(0, 0, 0))      //verify input
			{
				$this->controller->SaveData1('OUI');
				include ('./views/AppResDet.php');
			}
			else if ($checkdata == array(0, 0, 1)) //verify input
			{
				$this->controller->SaveData1('NON');
				include ('./views/AppResDet.php');
			}
			else
			{
				include ('./views/AppResIn.php');  //Reset page if input isn't valid
			}
		}
	}
	
	public function output3(){
		$this->model = $_SESSION['reservation'];
		
		if ($this->controller->NoInput2() == 0) //if there is no new input
		{
			if ($this->controller->ExistingData()[1] == 0) //Go to the next page if data exists
				{include ('./views/AppResVal.php');}
			else
				{include ('./views/AppResDet.php');}        //Else reset page
		}
		else //if there is new input
		{
			$checkdata = $this->controller->VerifyData2();
			if ($checkdata == 0)      //verify input
			{
				$this->controller->SaveData2();
				include ('./views/AppResVal.php');
			}
			else
			{
				include ('./views/AppResDet.php');  //Reset page if input isn't valid
			}
		}
		
		/*$this->model = $_SESSION['reservation'];
		
		if ($this->controller->ExistingData()[1] != 0)
		{
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
		else if ($this->controller->ExistingData()[1] == 0)
		{
			include ('./views/AppResVal.php');
		}*/
	}
	
	public function output4(){
		$this->model = $_SESSION['reservation'];
		
		include('./views/AppResCnf.php');
	}
}
?>