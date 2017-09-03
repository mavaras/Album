<?php 

include_once("C/controller.php");

$action = @$_REQUEST['action']; 
if($action == '') { echo "<script>console.log(',,');</script>";
	$controller = new Controller();
}

$controller->start();

switch ($action) {
	case 'login':
		echo "<script>console.log('login');</script>";
		$controller->login();
		break;

	case 'register':
		echo "<script>console.log('register');</script>";
		$controller->register();
		break;

	default:
		break;
}

?>