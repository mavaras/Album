<?php 

include_once("C/controller.php");

$controller = new Controller();
$controller->start();

$action = @$_REQUEST['action']; 
if($action == '') { // Para la primera vez solo
	echo "<script>location.href = './V/cojones.php';</script>";
}

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