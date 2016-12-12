<?php
class Controller {
	
	private $model;
	
	public function __construct($model){
		$this->model = $model;
	}
	
	/*Saves data from the 1st form into model*/
	public function SaveData1($warranty){
		$this->model->destination = htmlspecialchars($_POST["destination"]);
		$this->model->seats= htmlspecialchars($_POST["seats"]);
		$this->model->warranty= htmlspecialchars($warranty);
		
		$_SESSION['reservation'] = $this->model;
	}
	
	/*Saves data from the 2nd form into model*/
	public function SaveData2(){
		$this->model = $_SESSION['reservation'];
		$this->model->names= $this->SafeArrays($_POST["nom"]);
		$this->model->ages=  $this->SafeArrays($_POST["age"]);
		
		$_SESSION['reservation'] = $this->model;
	}
	
	/*reset reservation and reservation data*/
	public function ResetRes(){
		$this->model->ResetData();
		include ('./views/AppResIn.php');
	}
	
	/*Verifies if entries exist*/
	public function CheckExistence($var){
		if (isset($var))  //gettype($var) == 'string'
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
		$res = [];
		foreach ($arr as $instance)
		{
			$instance = htmlspecialchars($instance);
			$res[] = $instance;
		}
		return $res;
	}
	
	/*Verifies whether we can go to the next page or not*/
	public function VerifyData1(){
		$check1= 1; /*1 represents an error flag*/
		$check2= 1;
		$check3= 1;
		
		$check1= $this->CheckExistence($_POST["destination"]);
		
		if (null !== $_POST["seats"] && is_numeric($_POST["seats"]))
		{
			$check2 = 0;
		}
		else
		{
			$check2= 1;
		}
		
		$check3=isset($_POST["warranty"])? 0: 1;
		return array($check1, $check2, $check3);
	}
	
	/*Verifies whether we can co from page 2 to 3*/
	public function VerifyData2(){
		$namelist  = $_POST['nom'];
		$agelist   = $_POST['age'];
		
		$checklist1 = [];
		$checklist2 = [];
		
		foreach ($namelist as $name)
		{
			if (!$this->CheckExistence($name) && is_string($name) && $name != '')
			{
				$checklist1[] = 0;
			}
			else
			{
				$checklist1[] = 1;
			}
		}
		
		foreach ($agelist as $age)
		{
			if (!$this->CheckExistence($age) && is_numeric($age))
			{
				$checklist2[] = 0;
			}
			else
			{
				$checklist2[] = 1;
			}
		}
		
		if (in_array(1, $checklist1) or in_array(1, $checklist2)) //checklist are arrays containing
		{														  //0 and 1 with 1 representing errors 
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function ExistingData()
	{
		$Dest = $_SESSION['reservation']->GetDestination();
		$Seat = $_SESSION['reservation']->GetSeats();
		$Warr = $_SESSION['reservation']->GetWarranty();
		if (is_String($Dest) && $Dest != "")
		{
			$C1 = 0;
		}
		if (is_numeric($Seat) && $Seat != "")
		{
			$C2 = 0;
		}
		if (is_string($Warr) && $Warr != "")
		{
			$C3 = 0;
		}
		
		$Name = $_SESSION['reservation']->GetNames();
		$Ages = $_SESSION['reservation']->GetAges();
		if (isset($Name) && $Name != "")
		{
			$C4 = 0;
		}
		if (isset($Ages) && $Ages != "")
		{
			$C5 = 0;
		}
		
		$res = [];
		
		if ($C1 == 0 && $C2 == 0 && $C3 == 0)
		{
			$res[] = 0;
		}
		else
		{
			$res[] = 1;
		}
		if ($C4 == 0 && $C5 == 0)
		{
			$res[] = 0;
		}
		else
		{
			$res[] = 1;
		}
		return $res;
	}
}
?>