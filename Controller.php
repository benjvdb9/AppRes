<?php
class Controller {
	
	private $model;
	
	public function __construct($model){
		$this->model = $model;
	}
	
	/*Saves data from the 1st form into model*/
	public function SaveData1(){
		$this->model->destination = htmlspecialchars($_POST["destination"]);
		$this->model->seats= htmlspecialchars($_POST["seats"]);
		$this->model->warranty= htmlspecialchars($_POST["warranty"]);
	}
	
	/*Saves data from the 2nd form into model*/
	public function SaveData2(){
		$this->model->names= htmlspecialchars($_POST["names"]);
		$this->model->ages= htmlspecialchars($_POST["ages"]);
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
	
	/*Verifies whether we can go to the next page or not*/
	public function VerifyData1(){
		$check1= 1;
		$check2= 1;
		$check3= 1;
		
		$check1= CheckExistence($model->GetDestination());
		
		if (null !== $model.GetSeats() && is_numeric($model->GetSeats()))
		{
			$check2 = 0;
		}
		else
		{
			$check2= 1;
		}
		
		$check3= CheckExistence($model->GetWarranty());
		
		return array($check1, $check2, $check3);
	}
}
?>