<?php
require('Model.php');
require('Controller.php');
require('View.php');

$mysqli = new mysqli("localhost", "root", "", "AppResDB") or
die("Could not select database");

if ($mysqli->connect_errno) {
	echo "Echec lors de la connexion à MYSQL : (" . $mysqli->connect_errno . ")
	" . $mysqli->connect_error;
}

/*$sql1 = "DELETE FROM AppResDB";
$sql2 = "DELETE FROM People";
$mysqli->query($sql1);
$mysqli->query($sql2);*/ //erases databe if necessary

session_start();
	
if (isset($_SESSION['reservation']))
	{$model= $_SESSION['reservation'];}
else
{
	$model= new Model();
	$model->ChnMod(0);
	$_SESSION['reservation'] = $model;
}

$controller= new Controller($model);
$view= new View($model, $controller);

if(isset($_POST['Reset'])==1)
	{
		$controller->ResetRes();  //Resets data when button pressed
		$model->ChnMod(0);
	} 

$controller->saveDB($mysqli);
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
			$ID = str_replace("9", "", $_POST['Page']);
			$view->outputDel($ID);
			break;
	}
}
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
	}
}

if (isset($_POST['edit'])) {
	$view->outputEdit($_POST['edit']);
}
?>