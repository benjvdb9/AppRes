<?php
class ResClass {
	
	session_start();
	
	private $destination;
	private $seats;
	private $warranty;
	private names;
	private $ages;
	
	function SaveData()
	{
		$this->destination = $_POST["destination"];
		$this->seats= $_POST["seats"];
		$this->warranty= $_POST["warranty"];
		$this->names= $_POST["names"];
		$this->ages= $_POST["ages"];
	}
	
	function getDestination()
	{
		return $this->destination
	}

	function getSeats()
	{
		return $this->Seats
	}
	
	function getWarranty()
	{
		return $this->Warranty
	}
	
	function getNames()
	{
		return $this->Names
	}
	
	function getAges()
	{
		return $this->Ages
	}
}
?>