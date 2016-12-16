<?php
class Controller {
	
	private $model;
	
	public function __construct($model){
		$this->model = $model;
	}
	
	/*Saves data from the 1st form into model*/
	public function SaveData1($warranty){
		$this->model = $_SESSION['reservation'];
		var_dump($_SESSION['reservation']);
		
		$this->model->ChDestination(htmlspecialchars($_POST["destination"]));
		$this->model->ChSeats(htmlspecialchars($_POST["seats"]));
		$this->model->ChWarranty(htmlspecialchars($warranty));
		
		$_SESSION['reservation'] = $this->model;
		var_dump($_SESSION['reservation']);
	}
	
	/*Saves data from the 2nd form into model*/
	public function SaveData2(){
		$this->model = $_SESSION['reservation'];
		var_dump($_SESSION['reservation']);
		
		$this->model->ChNames($this->SafeArrays($_POST["nom"]));
		$this->model->ChAges($this->SafeArrays($_POST["age"]));
		
		$_SESSION['reservation'] = $this->model;
		var_dump($_SESSION['reservation']);
	}
	
	/*reset reservation and reservation data*/
	public function ResetRes(){
		var_dump('Data reset');
		$this->model->ResetData();
		$_SESSION['reservation'] = $this->model;
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
	
	/*Verifies whether we can go from page 2 to 3*/
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
	
	public function NoInput()
	{
		if ($_POST["destination"]== '' and $_POST["seats"]== '' and !isset($_POST["warranty"]))
		{
			return 0;
		}
		else
		{
			return 1; //Not entirely empty
		}
	}
	
	public function ExistingData()
	{
		$C1 = 1;
		$C2 = 1;
		$C3 = 1;
		$C4 = 1;
		$C5 = 1;
		$Dest = $this->model->GetDestination();
		$Seat = $this->model->GetSeats();
		$Warr = $this->model->GetWarranty();
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
		
		$Name = $this->model->GetNames();
		$Ages = $this->model->GetAges();
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
	
	public function CalcPrice()
	{
		$this->model = $_SESSION['reservation'];
		
		$ages = $this->model->GetAges();
		$sum = 0;
		
		foreach($ages as $age)
		{
			if ($age < 12)
				{$sum += 10;}
			else
				{$sum += 15;}
		}
		return $sum;
	}
}
?>