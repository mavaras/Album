<?php

	include "conexion.php";

	$conexion = mysqli_connect($host, $user, $pass, $db);
	if(!$conexion) {
		echo "<script>console.log('Error al conectarse a la base de datos (register.php)s');</script>";
	} else {
		echo "<script>console.log('Conexión establecida');</script>";

		// Recibir datos
		$name = $_POST['name'];
		$nickname = $_POST['nickname'];
		$avatar = "noone";
		$mail = $_POST['email'];
		$pass = $_POST['password'];
		$passR = $_POST['passwordR'];
		
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

		if($gonorrea == 1) header("refresh:1; ./register.php"); // Hay algo mal!

		// Base de datos
		$query_insert = "INSERT INTO user (name, nickname, email, pass, avatar) 
						 VALUES ('$name', '$nickname', '$mail','$pass', '$avatar');";
		$result_query_insert = mysqli_query($conexion, $query_insert);
		if($result_query_insert) {
			echo "<script>console.log('Usuario registrado correctamente');</script>";
			
			// Crear carpetas del usuario
			$path = 'images/' . $nickname . '/';
			mkdir($path, 0777, true);
			$path .= 'albumes/';
			mkdir($path, 0777, true);
			$path = 'images/' . $nickname . '/avatar/';
			mkdir($path, 0777, true);
			
			header("refresh:1; ./../index.php");
		} 
		else {
			echo "<script>console.log('Usuario no registrado');</script>";
		}
	}
?>