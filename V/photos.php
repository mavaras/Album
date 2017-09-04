<?php
session_start();
if($_GET['visit'] == 1) {
	include 'album.php';
} else if ($_GET['visit'] == 2) {
	include 'myAlbum.php';
} else {
	echo 'Ruta desconocida.';
}

?>