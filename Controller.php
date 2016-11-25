<?php
class Controller {
	
	private $model;
	
	public function __construct($model){
		$this->model = $model;
	}
	
	/*Saves data from the 1st form into model*/
	public function SaveData1(){
		var_dump($_SESSION['reservation']);
		$this->model->destination = htmlspecialchars($_POST["destination"]);
		$this->model->seats= htmlspecialchars($_POST["seats"]);
		$this->model->warranty= htmlspecialchars($_POST["warranty"]);

		$_SESSION['reservation'] = serialize($this->model);
		var_dump(unserialize($_SESSION['reservation']));
	}
	
	/*Saves data from the 2nd form into model*/
	public function SaveData2(){
		var_dump($_SESSION['reservation']);
		$this->model = $_SESSION['reservation'];
		$this->model->names= $this->SafeArrays($_POST["nom"]);
		$this->model->ages=  $this->SafeArrays($_POST["age"]);
		
		$_SESSION['reservation'] = serialize($this->model);
		var_dump(unserialize($_SESSION['reservation']));
	}
	
	/*reset reservation and reservation data*/
	public function ResetRes(){
		$this->model->ResetData();
		include ('./views/AppResIn.php');
	}
	
	/*Verifies if entries exist*/
	public function CheckExistence($var){
		if (isset($var))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Turns every component of an array into a safe string*/
	public function SafeArrays($arr)
	{
		foreach ($arr as $instance)
		{
			$instance = htmlspecialchars($instance);
		}
	}
	
	/*Verifies whether we can go to the next page or not*/
	public function VerifyData1(){
		$check1= 1;
		$check2= 1;
		$check3= 1;
		
		$check1= $this->CheckExistence($this->model->GetDestination());
		
		if (null !== $this->model->GetSeats() && is_numeric($this->model->GetSeats()))
		{
			$check2 = 0;
		}
		else
		{
			$check2= 1;
		}
		
		$check3= $this->CheckExistence($this->model->GetWarranty());
		
		return array($check1, $check2, $check3);
	}
	
	public function VerifyData2(){
		$checkname = 1;
		$checkage  = 1;
		$namelist  = $_POST['nom'];
		$agelist   = $_POST['age'];
		
		foreach ($namelist as $name)
		{
			if ($this->CheckExistence($name))
			{
				$name = 0;
			}
		}
		
		foreach ($agelist as $age)
		{
			if ($this->CheckExistence($age))
			{
				$age = 0;
			}
		}
		
		if (in_array(1, $namelist) or in_array(1, $agelist))
		{
			var_dump($namelist);
			var_dump($agelist);
		}
		else
		{
			return 0;
		}
	}
}
?>