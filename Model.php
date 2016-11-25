<?php
class Model {
	
	public $destination; /*public*/
	public $seats;
	public $warranty;
	public $names;
	public $ages;
	
	public function ResetData()
	{
		$this->destination= "";
		$this->seats= 		"";
		$this->warranty= 	"";
		$this->names= 		"";
		$this->ages= 		"";
	}
	
	public function getDestination()
	{
		return $this->destination;
	}

	public function getSeats()
	{
		return $this->seats;
	}
	
	public function getWarranty()
	{
		return $this->warranty;
	}
	
	public function getNames()
	{
		return $this->names;
	}
	
	public function getAges()
	{
		return $this->ages;
	}
}
?>