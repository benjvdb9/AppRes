<?php
class Model {
	
	private $destination=	"";
	private $seats=			"";
	private $warranty= 		"";
	private $names=  		"";
	private $ages = 		"";
	
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