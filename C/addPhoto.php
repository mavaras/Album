<?php
	session_start();
	include "conexion.php";

	
	$esteban = $_SESSION['nickname'];
	// $description = $_POST['description'];
	// $name = $_POST['name'];
	$id = $_SESSION['id'];
	$nameAlbum = $_GET['nein'];
	echo $nameAlbum;
	$path = "../Multimedia/" . $esteban . "/" . $nameAlbum . "/";
	echo "<br>" . $path;
	if(file_exists($path)) {
	    // Si no existe la ruta, posiblemente fue que nos quisieron hacer trampa
	    $target_path = $path;
		$_SESSION['avatar'] = $path . $_FILES['uploadedfile']['name'];

		$target_path = $target_path . basename($_FILES['uploadedfile']['name']); 
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			echo "<script>location.href = '../V/photos.php?visit=1';</script>";
			//header("refresh:1; ./V/profile.php");
		} 
		else { 
			echo "<script>console.log('Ha ocurrido un error.');</script>";
		}
	}

	

	


?>