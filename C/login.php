<?php
	
	include "conexion.php";

	$conexion = mysqli_connect($host, $user, $pass, $db);
	if(!$conexion) {
		echo "<script>console.log('Error al conectarse a la base de datos (login.php)');</script>";
	} else {
		echo "<script>console.log('Conexión establecida');</script>";

		// Recibir datos
		$email = $_POST['email'];
		$pass = $_POST['password'];

		$query = "SELECT * FROM user WHERE email = '$email' AND pass = '$pass';";
		$query_gonorrea = mysqli_query($conexion, $query);
		if (mysqli_num_rows($query_gonorrea) != 0) {
			echo "<script>console.log('Usuario logueado');</script>";
			
			session_start();
			$row = mysqli_fetch_array($query_gonorrea);
			$_SESSION['pass'] = $pass;
			$_SESSION['id'] = $row['id'];
			$_SESSION['nickname'] = $row['nickname'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['rol'] = $row['rol'];
			$_SESSION['avatar'] = $row['avatar']; // ?? creo que aquí debería guardarse la ruta
			$_SESSION['mail'] = $email;
			$_SESSION['time'] = time();

			//header("refresh:1; ./profile.php");
		} else {
			echo "<script>console.log('Error al loguear');</script>";
		}
	}

?>