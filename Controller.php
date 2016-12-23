<?php
class Controller {
	
	private $model;
	
	public function __construct($model){
		$this->model = $model;
		$this->mysqli = '';
		$this->ID = '';
	}
	
	/*Saves data from the 1st form into model*/
	public function SaveData1($warranty){
		$this->model = $_SESSION['reservation'];
		
		$this->model->ChDestination(htmlspecialchars($_POST["destination"]));
		$this->model->ChSeats(htmlspecialchars($_POST["seats"]));
		$this->model->ChWarranty(htmlspecialchars($warranty));
		
		$_SESSION['reservation'] = $this->model;
	}
	
	/*Saves data from the 2nd form into model*/
	public function SaveData2(){
		$this->model = $_SESSION['reservation'];
		
		$this->model->ChNames($this->SafeArrays($_POST["nom"]));
		$this->model->ChAges($this->SafeArrays($_POST["age"]));
		
		$_SESSION['reservation'] = $this->model;
	}
	
	/*reset reservation and reservation data*/
	public function ResetRes(){
		var_dump('Data reset');
		$this->model->ResetData();
		$_SESSION['reservation'] = $this->model;
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
	
	public function NoInput1()
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
	
	public function NoInput2()
	{
		try {
			$_POST["nom"];
		}
		catch(Exception $e) {
			return 99;
		}
		if ($_POST["nom"]== [] and $_POST["age"]== [])
		{
			return 0;
		}
		else
		{
			return 1; //Not entirely empty
		}
	}
	
	public function saveDB($DB)
	{
		$this->mysqli = $DB;
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
		$warr = $this->model->GetWarranty();
		$sum = 0;
		
		foreach($ages as $age)
		{
			if ($age < 12)
				{$sum += 10;}
			else
				{$sum += 15;}
		}
		
		if ($warr == 'OUI') {
			$sum += 20;
		}
		return $sum;
	}
	
	public function createID($results)
	{
		$resultsarray = $this->mysqlResultToArray($results);
		$IDarray = [];
		
		foreach ($resultsarray as $array) {
			$IDarray[] = $array['ID'];
		}
		
		$id = 1;
		
		if ($IDarray == []) {
			return $id;
		}
		while ($id <= max($IDarray) + 1) {
			if (in_array($id, $IDarray))
				{$id++;}
			else
				{return $id;}
		}
	}
	
	public function saveToDB($mysqli)
	{
		$this->model = $_SESSION['reservation'];
		
		$query = "SELECT * FROM AppResDB";
		$results = $mysqli->query($query) or die("Query failed");
		
		$ID   = $this->createID($results);
		$dest = str_replace("'", "''", $this->model->getDestination());
		$seat = $this->model->getSeats();
		$warr = $this->model->getWarranty();
		$names = $this->model->getNames();
		$ages  = $this->model->getAges();
		
		$i=0;
		foreach ($names as $name) {
			$name= str_replace("'", "''", $name);
			$age = str_replace("'", "''", $ages[$i]);
			$sql = "INSERT INTO People (ID, Name, Age) Values ('$ID', '$name', '$age')";
			$i ++;
			
			if ($mysqli->query($sql) === TRUE) {} 
			else{
				echo "Error when saving to Database" . $mysqli->error;
			}
		}
		
		$sql = "INSERT INTO AppResDB(ID, Destination, Seats, Warranty)
				Values ('$ID', '$dest', '$seat', '$warr')";
				
		if ($mysqli->query($sql) === TRUE) {}
		else{
			echo "Error inserting record " . $mysqli->error;
		}
		
		$results->close();
	}
	
	public function modifyDB()
	{
		$this->model = $_SESSION['reservation'];
		
		$ID = (int) $this->model->getID();
		$dest = str_replace("'", "''", $this->model->getDestination());
		$seat = $this->model->getSeats();
		$warr = $this->model->getWarranty();
		
		$sql = "UPDATE AppResDB SET Destination='$dest', Seats='$seat', Warranty='$warr' WHERE ID='$ID'";
		
		if ($this->mysqli->query($sql)===TRUE) {
			echo 'Record updated successfully';
		} else {
			echo 'Error updating record: ' . $this->mysqli->error;
		}
		
		$sql = "DELETE FROM People WHERE ID='$ID'";
		$this->mysqli->query($sql) or die("1 ERROR");
		
		$i=0;
		$names = $this->model->getNames();
		$ages  = $this->model->getAges();
		
		foreach ($names as $name) {
			$name = str_replace("'", "''", $name);
			$age = $ages[$i];
			$sql = "INSERT INTO People (ID, Name, Age) Values ('$ID', '$name', '$age')";
			$i ++;
			
			if ($this->mysqli->query($sql) === TRUE) {} 
			else{
				echo "Error when modifying database: " . $this->mysqli->error;
			}
		}
	}
	
	public function verifyPassword($psw)
	{
		if ($psw == 'Admin') {
			return true;
		}
		return false;
	}
	
	public function mysqlResultToArray($results)
	{
		$list = [];
		foreach ($results as $result)
		{
			$list[] = $result;
		}
		return $list;
	}
	
	public function sortPeople($PeopleList)
	{
		$names = [];
		$ages = [];
		foreach ($PeopleList as $array) {
			$names[] = $array['Name'];
			$ages[]  = $array['Age'];
		}
		$result = [$names, $ages];
		return $result;
	}
	
	public function recallInfo($ID)
	{
		$this->ID = $ID;
		$this->model->ChnID($ID);
		$sql = "SELECT * FROM AppResDB WHERE ID='$ID'";
		$results = $this->mysqli->query($sql) or die("Query failed");
		
		foreach ($results as $elem) {
			$result = $elem; //There is only one result
		}
		$this->model->ChDestination($result['Destination']);
		$this->model->ChSeats($result['Seats']);
		$this->model->ChWarranty($result['Warranty']);
		$results->close();
		
		$sql = "SELECT * FROM People WHERE ID='$ID'";
		$results = $this->mysqli->query($sql) or die("Query failed");
		
		$PeopleList = $this->mysqlResultToArray($results);
		$results->close();
		$People = $this->sortPeople($PeopleList);
		
		$this->model->ChNames($People[0]);
		$this->model->ChAges($People[1]);
		$this->model->ChnMod(1);
		
		$_SESSION['reservation'] = $this->model;
	}
	
	public function delRow($ID)
	{
		$sql = "DELETE FROM AppResDB WHERE ID='$ID'";
		$sql2 = "DELETE FROM People WHERE ID='$ID'";
		
		$this->mysqli->query($sql) or die("1 ERROR");
		$this->mysqli->query($sql2) or die("2 ERROR");
	}
}
?>