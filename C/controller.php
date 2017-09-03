<?php

include_once("M/model.php");

class Controller {
	public $model,
		   $conexion;

	public function __construct() { // Sólo va con header esta mierda...
		//header("refresh:1; ./V/cojones.php"); // Cutrez
		//echo "<script>location.href = './V/cojones.php';</script>";
	}
	
	/*public function what_to_do($action) {
		switch ($action) {
			case 'login':
				echo "<script>console.log('login');</script>";
				$this->login();
				break;

			case 'register':
				echo "<script>console.log('register');</script>";
				$this->register();
				break;

			default:
				break;
		}
	}*/

	public function login() {
		$pene = $this->model->get_login();
		if($pene == 'login') { 
			echo "<script>location.href = './V/profile.php';</script>";
		}
		else { 
			echo "<script>location.href = './V/cojones.php';</script>";
		}
	}

	public function register() {
		$pene = $this->model->get_register();
		if($pene == 'register') { echo "<script>console.log('register');</script>";
			echo "<script>location.href = './V/cojones.php';</script>";
		}
		else { echo "<script>console.log('register!');</script>";
			echo "<script>location.href = './V/cojones.php';</script>";
		}
	}

	public function start() {
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db   = "esteban_y_mario";

		$this->conexion = mysqli_connect($host, $user, $pass, $db);
		if(!$this->conexion) {
			echo "<script>console.log('Error al conectarse a la base de datos (login.php)');</script>";
		} 
		else {
			$this->model = new Model($this->conexion);
		}
  	}
}

?>