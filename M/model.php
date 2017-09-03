<?php

//include "/Album/C/conexion.php";
include "user.php";

class Model {
	public $conexion,
		   $user;

	public function __construct($cnx) {
		$this->conexion = $cnx;
	}

	public function get_login() {echo "<script>console.log('___________');</script>";
		$mail = $_POST['email'];
		$pass = $_POST['password'];

		$query = "SELECT * FROM user WHERE email = '$mail' AND pass = '$pass';";
		$query_gonorrea = mysqli_query($this->conexion, $query);
		if (mysqli_num_rows($query_gonorrea) != 0 and $pass != NULL) {
			echo "<script>console.log('Usuario logueado');</script>";
				
			session_start();
			$row = mysqli_fetch_array($query_gonorrea);
			$_SESSION['pass'] = $pass;
			$_SESSION['id'] = $row['id'];
			$_SESSION['nickname'] = $row['nickname'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['rol'] = $row['rol'];
			$_SESSION['avatar'] = $row['avatar'];
			$_SESSION['mail'] = $mail;
			$_SESSION['time'] = time();

			return 'login';
		} 
		else {
			echo "<script>console.log('Error al loguear');</script>";
				
			return 'invalid_user';
		}
	}

	public function get_register() {echo "<script>console.log('!!!!');</script>";
		$name = $_POST['name'];
		$nickname = $_POST['nickname'];
		$avatar = "noone";
		$mail = $_POST['email'];
		$pass = $_POST['password'];
		$passR = $_POST['passwordR'];
		$rol = "un_rol";
		
		$gonorrea = 0;

		// Comprobar datos
		if($name == NULL
		or $nickname == NULL
		or $pass == NULL
		or $passR == NULL
		or $mail == NULL) {
			echo "<script>console.log('Has dejado campos sin introducir, parguela.');</script>";
			$gonorrea = 1;
		}

		if($pass != $passR) {
			echo "<script>console.log('Las contraseñas no coinciden.');</script>";
			$gonorrea = 1;
		}

		if(strlen($pass) < 6) {
			echo "<script>console.log('Contraseña muy corta, como tu polla.');</script>";
			$gonorrea = 1;
		}

		$mail_split = explode("@", $mail, 2);
		if($mail_split[1] == NULL) {
			echo "<script>console.log('Email inválido: revisa.');</script>";
			$gonorrea = 1;
		}

		if($gonorrea == 1) echo "Hay algo mal joder"; // Hay algo mal!
		//else {
			$this->user = new User(); 
			$this->user->set_values($name,
								    $nickname,
									$mail,
									$pass,
									$avatar,
									$rol);$this->user->show_user();
			$this->user->create($this->conexion);
		//}

		
			// Crear carpetas del usuario
			/*$path = 'images/' . $nickname . '/';
			mkdir($path, 0777, true);
			$path .= 'albumes/';
			mkdir($path, 0777, true);
			$path = 'images/' . $nickname . '/avatar/';
			mkdir($path, 0777, true);*/
		
	}
}

?>