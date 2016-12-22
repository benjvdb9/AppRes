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
$mysqli->query($sql2);*/ //erases databe if necessary

session_start();
	
if (isset($_SESSION['reservation']))
	{$model= $_SESSION['reservation'];}
else
	{var_dump("New Model Created");
	$model= new Model();
	$_SESSION['reservation'] = $model;}

$controller= new Controller($model);
$view= new View($model, $controller);

if(isset($_POST['Reset'])==1)
	{$controller->ResetRes();} //Resets data when button presseed

$controller->saveDB($mysqli);
switch (isset($_POST['Page']) ? $_POST['Page'] : '0'){
	case '5':
		echo $view->output5();
		break;
		
	case '4':
		include('./views/AppResDet.php');
		break;
		
	case '3':
		var_dump($_SESSION['reservation']);
		echo $view->output4();
		$controller->saveToDB($mysqli);
		break;
		
	case '2':
		var_dump($_SESSION['reservation']);
		echo $view->output3();
		break;

	case '1':
		var_dump($_SESSION['reservation']);
		echo $view->output2();
		break;

	case '0':
	default:
		echo $view->output1();
		break;
}

if (isset($_POST['edit'])) {
	$view->outputEdit($_POST['edit']);
}

if (isset($_POST['del'])) {
	$controller->delRow($_POST['del']);
}
?>