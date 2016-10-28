<?php
class ResClass {
	
	private $destination=	"";
	private $seats=			"";
	private $warranty= 		"";
	private $names=  		"";
	private $ages = 		"";
	
	public function SaveData1()
	{
		$this->destination = htmlspecialchars($_POST["destination"]);
		$this->seats= htmlspecialchars($_POST["seats"]);
		$this->warranty= htmlspecialchars($_POST["warranty"]);
	}
	
	public function SaveData2()
	{
		$this->names= htmlspecialchars($_POST["names"]);
		$this->ages= htmlspecialchars($_POST["ages"]);
	}
	
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