<?php
class Controller {
	
	private $model;
	
	public function __construct($model){
		$this->model = $model;
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
		
		$check1= this->CheckExistence($model.GetDestination());
		
		if (isset($model.GetSeats()) && is_numeric($model.GetSeats()))
		{
			$check2 = 0;
		}
		else
		{
			$check2= 1;
		}
		
		$check3= this->CheckExistence($model.GetWarranty());
		
		return array($check1, $check2, $check3);
	}
	
	/*Directs us to the next page while handling errors*/
	/*public function NextPage(){
		$check = this->VerifyData1();
		
		if ($check[1] == 1 || $check[2] == 1)
		{
			/*Notify Error
		}
		else
		{
			
		}*/
	}
}
?>