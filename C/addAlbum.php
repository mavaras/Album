<?php
	
	include "conexion.php";

	session_start();
	$conexion = mysqli_connect($host, $user, $pass, $db);
	if(!$conexion) {
		echo "<script>console.log('Error al conectarse a la base de datos (img.php)');</script>";
	} 
	else {
		$description = $_POST['description'];
		$name = $_POST['name'];
		$id = $_SESSION['id'];
		
		$query_insert = "INSERT INTO album (name, description, user) 
						 VALUES ('$name', '$description', '$id');";
		$result_query_insert = mysqli_query($conexion, $query_insert);
		if($result_query_insert) {
			$aux = $_SESSION['nickname'];
			$path = 'images/' . $aux . '/' . $name . '/';
			echo $path;
			mkdir($path, 0777, true);

			//header("refresh:1; ./photos.php");
		}
		else {
			echo "<script>console.log('Error en query_insert (addAlbum.php);</script>";
		}
	}
?>