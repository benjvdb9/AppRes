<?php
require('Model.php');
require('Controller.php');
require('View.php');

$model= new Model();
$controller= new Controller($model);
$view= new View($model, $controller);

$model->ResetData();

session_start();
$_SESSION['reservation'] = $model;

switch (isset($_POST['Page']) ? $_POST['Page'] : '0'){
	case '2':
		echo $view->output3();
		break;

	case '1':
		echo $view->output2();
		break;

	case '0':
	default:
		echo $view->output1();
		break;
}
?>