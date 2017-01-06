<?php
class View {
	
	private $model;
	private $controller;
	
	public function __construct($model, $controller){
		$this->model = $model;
		$this->controller = $controller;
	}
	
	//Page 1, no requirements needed
	public function output1(){
		include('./views/AppResIn.php');
	}

	//Page 2, verifies if data from page 1 is ok
	public function output2(){
		$this->model = $_SESSION['reservation'];
		
		if ($this->controller->NoInput1() == 0) //if there is no new input
		{
			if ($this->controller->ExistingData()[0] == 0) //Go to the next page if data exists
				{include ('./views/AppResDet.php');}
			else
				{include ('./views/AppResIn.php');}        //Else reset page 1
		}
		else //if there is new input
		{
			$checkdata = $this->controller->VerifyData1();
			if ($checkdata == array(0, 0, 0))      				//verify input
			{
				$this->controller->SaveData1('OUI');
				include ('./views/AppResDet.php');
			}
			else if ($checkdata == array(0, 0, 1)) 				//verify input
			{
				$this->controller->SaveData1('NON');
				include ('./views/AppResDet.php');
			}
			
			//if data not valid
			else
			{
				if ($checkdata[0]== 1) //Destination not valid
					{$l1 = 'Veiller entrer une destination valide<br />';}
				else
					{$l1 = '';}
				
				if ($checkdata[1] == 1) //Seats not valid
					{$l2 = 'Veiller entrer un chiffre pour le nombre de places<br />';}
				else
					{$l2 = '';}
				
				//error message
				echo "
					<style>
						p.error {
							border-style: solid;
							border-color: red;
						}
					</style>
					<p class='error'>".$l1." ".$l2."</p>
				";
				
				include ('./views/AppResIn.php');  //Reset page 1
			}
		}
	}
	
	//Page 3, verifies if data from page 2 is ok
	public function output3(){
		$this->model = $_SESSION['reservation'];
		
		if ($this->controller->NoInput2() == 0) //if there is no new input
		{
			if ($this->controller->ExistingData()[1] == 0) //Go to the next page if data exists
				{include ('./views/AppResVal.php');}
			else
				{include ('./views/AppResDet.php');}        //Else reset page 2
		}
		else //if there is new input
		{
			$checkdata = $this->controller->VerifyData2();
			if ($checkdata == 0)      //verify input
			{
				$this->controller->SaveData2();
				include ('./views/AppResVal.php');
			}
			
			//if input not valid
			else
			{
				
				//error message
				echo "
					<style>
						p.error {
							border-style: solid;
							border-color: red;
						}
					</style>
					<p class='error'>Veuillez entrer des données correctes</p>
				";
				
				include ('./views/AppResDet.php');  //Reset page if input isn't valid
			}
		}
	}
	
	//Page 4, no requirements
	public function output4(){
		$this->model = $_SESSION['reservation'];
		include('./views/AppResCnf.php');
	}
	
	//Admin page, requires password
	public function output5($psw){
		if ($this->controller->verifyPassword($psw)) {
			include('./views/AppResAdm.php');
		}
		else {
			include('./views/AppResIn.php');
		}
	}
	
	//Deletes a reservation based on it's ID
	public function outputDel($ID) {
		$this->controller->delRow($ID);
		include('./views/AppResAdm.php');
	}
	
	//activates modifying mode, modifies a reservation based on it's ID
	public function outputEdit($ID) {
		$this->controller->recallInfo($ID); 				//fetches the data that is to be modified 
		header("Refresh:0"); 								//refresh necessary for the data to show up in the fields
	}
	
	//Page 4 in MDODIFYING mode
	public function output4M() {
		$this->model = $_SESSION['reservation'];
		
		$this->controller->modifyDB();  //updates Database
		$this->model->ChnMod(0);        //leave MODIFYING mode
		$this->output5('Admin');		//go back to Admin page
		
		$_SESSION['reservation'] = $this->model;
	}
}
?>