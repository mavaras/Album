<?php

include "C/conexion.php";

session_start();
$esteban = $_SESSION['nickname'];
$path = 'images/' . $esteban . '/avatar/';
if(!file_exists($path)) {
    mkdir($path, 0777, true);
}

$target_path = $path;
$_SESSION['avatar'] = $path . $_FILES['uploadedfile']['name'];

$conexion = mysqli_connect($host, $user, $pass, $db);
if(!$conexion) {
	echo "<script>console.log('Error al conectarse a la base de datos (img.php)');</script>";
} 
else {
	$aux = $_SESSION['avatar'];
	$query_update = "UPDATE user SET avatar = '$aux'";
	$result_query_update = mysqli_query($conexion, $query_update);
	if(!$result_query_update) {
		echo "<script>console.log('Problemas en result_query_insert');</script>";
	} 
}

$target_path = $target_path . basename($_FILES['uploadedfile']['name']); 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	echo "<script>console.log('El archivo ". basename($_FILES['uploadedfile']['name']). " ha sido subido.')</script>";
	//header("refresh:1; ./V/profile.php");
} 
else { 
	echo "<script>console.log('Ha ocurrido un error.');</script>";
}

?>