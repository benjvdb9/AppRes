<?php
require('Model.php');
require('Controller.php');
require('View.php');

session_unset();
$model= new Model();
$_SESSION['reservation'] = $model;

$controller= new Controller($_SESSION['reservation']);
$view= new View($_SESSION['reservation'], $controller);

session_start();

switch (isset($_POST['Page']) ? $_POST['Page'] : '0'){
	case '3':
		echo $view->output4();
		break;
		
	case '2':
		if ($controller->ExistingData()[1] == 0)  //Data already exists
		{
			include ('./views/AppResVal.php');
		}
		else
		{
			echo $view->output3();
		}
		break;

	case '1':
		if ($controller->ExistingData()[0] == 0)
		{
			include ('./views/AppResDet.php');
		}
		else
		{
			echo $view->output2();
		}
		break;

	case '0':
	default:
		echo $view->output1();
		break;
}
?>