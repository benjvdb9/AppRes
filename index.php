<?php
require('Model.php');
require('Controller.php');
require('View.php');

$mysqli = new mysqli("localhost", "root", "", "AppResDB") or
die("Could not select database");

//verifies if we can connect to database
if ($mysqli->connect_errno) {
	echo "Echec lors de la connexion à MYSQL : (" . $mysqli->connect_errno . ")
	" . $mysqli->connect_error;
}

//erases databe if necessary

/*$sql1 = "DELETE FROM AppResDB";
$sql2 = "DELETE FROM People";
$mysqli->query($sql1);
$mysqli->query($sql2);*/

session_start();

//imports data from session if available
if (isset($_SESSION['reservation']))
	{$model= $_SESSION['reservation'];}

//else, creates new model
else
{
	$model= new Model();
	$model->ChnMod(0);
	$_SESSION['reservation'] = $model;
}

$controller= new Controller($model);
$view= new View($model, $controller);

//resets session data and model when reservation is canceled
if(isset($_POST['Reset'])==1)
	{
		$controller->ResetRes();  //Resets data
		$model->ChnMod(0);        //puts Mod at 0
	} 

//gives a copy of $mysqli to the controller for future use
$controller->saveDB($mysqli);

//when Mod is 0, and thus we aren't modifying existing data, enter loop 1
if ($model->getMod() == 0)
{
	switch (isset($_POST['Page']) ? $_POST['Page'] : '0'){
		case '5':
			echo $view->output5($_POST['psw']);
			break;
			
		case '4': //case where we go from page 3 to page 2, no verification required
			include('./views/AppResDet.php');
			break;
			
		case '3':
			echo $view->output4();
			$controller->saveToDB($mysqli);
			break;
			
		case '2':
			echo $view->output3();
			break;

		case '1':
			echo $view->output2();
			break;

		case '0':
			echo $view->output1();
			break;
			
		default:
			$ID = preg_replace("/9/", "", $_POST['Page'], 1);
			$view->outputDel($ID);
			break;
	}
}

//if we are modifying existing data, enter loop 2 
else
{
	switch(isset($_POST['Page']) ? $_POST['Page'] : '0'){
		case '5':
			echo $view->output5($_POST['psw']);
			break;
			
		case '3':
			echo $view->output4M();
			break;
			
		case '2':
			echo 'MODIFYING';
			echo $view->output3();
			break;
			
		case '1':
			echo 'MODIFYING';
			echo $view->output2();
			break;
		
		case '0':
			echo 'MODIFYING';
			echo $view->output1();
			break;
		
		/*in this case $_POST['page'] is a the ID of the reservation
		to delete preceded by a 9*/
		default:
			$ID = preg_replace("/9/", "", $_POST['Page'], 1);
			$view->outputDel($ID); //deletes a reservation
			break;
	}
}


if (isset($_POST['edit'])) {
	$view->outputEdit($_POST['edit']); //initialized MODIFYING mode
}
?>