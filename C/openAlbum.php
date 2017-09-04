<?php
	
	include "conexion.php";

	session_start();
	$conexion = mysqli_connect($host, $user, $pass, $db);
	if(!$conexion) {
		// echo "<script>console.log('Error al conectarse a la base de datos (img.php)');</script>";
		echo "fail";
	} 
	else {
		$name = $_POST['name'];
		$id = $_SESSION['id'];

		$queryGonorrea = "SELECT id FROM album WHERE user = '$id' AND name = '$name';";
		$res = mysqli_query($conexion, $queryGonorrea);
		if($res) {
			$row = mysqli_fetch_array($res);
			$idAlbum = $row['id'];
			$queryGonorrea2 = "SELECT * FROM album_photo WHERE id_album = '$idAlbum';";
			$result = mysqli_query($conexion, $queryGonorrea2);
			if($result) {
				// echo "2222";
				echo $result;
			}
			else {
				// echo "<script>console.log('Error en query_insert (addAlbum.php);</script>";
				echo "error";
			}
		}
		
		
	}
?>