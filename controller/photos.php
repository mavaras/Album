<!DOCTYPE html>
<html lang="en">
<head>
	<title>PROFILE / photos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/Album/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Album/css/more.css">
</head>
<body>
	<ul class="nav nav-tabs">
	  	<li role="presentation"><a href="profile.php">Home</a></li>
	  	<li role="presentation"><a href="friends.php">Friends</a></li>
	  	<li role="presentation" class="active"><a href="photos.php">Photos</a></li>
	  	<li class="perfil_de" role="presentation">Perfil de <?php session_start(); echo $_SESSION['nickname']; ?></li>
	  	<li role="presentation"><a href="modify.php">M</a></li>
	</ul>
	
	<br>
	
	<button onclick="showForm(1);">Add Album</button>

	<div id="addAlbum-form" class="addAlbum-form hidden">
		<h2><center>New Album</center></h2>
		<form class="form-horizontal" method="POST" action="addAlbum.php">
			<div class="form-group">
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" placeholder="Name">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10">
					<textarea type="text" class="form-control" id="description" name="description" placeholder="Description"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<center><button type="submit" class="btn btn-success">Add Album</button><center>
				</div>
			</div>
		</form>
	</div>
		
	<?php 
	include "conexion.php";

	$conexion = mysqli_connect($host, $user, $pass, $db);
	if(!$conexion) {
		echo "<script>console.log('Error al conectarse a la base de datos (img.php)');</script>";
	} 
	else {
		$aux = $_SESSION['id'];
		$query_select = "SELECT * FROM album WHERE user = '$aux';";
		$result_query_select = mysqli_query($conexion, $query_select);
		$n_albums = mysqli_num_rows($result_query_select);
		if(mysqli_num_rows($result_query_select) != 0) {
			$c;
			for($c = 0; $c < $n_albums; $c++) {
				$row = mysqli_fetch_array($result_query_select);
				echo "<br><a>album: </a>"; 
				echo $row['name'];
			}	
		}
	}
	?>

	<script src='/Album/js/jquery.js'></script>
	<script src='/Album/js/bootstrap.min.js'></script>
	<script type="text/javascript">
		function showForm(i) {
			var addAlbumForm = document.getElementById('addAlbum-form');
			if(addAlbumForm.className != "addAlbum-form hidden") {
				addAlbumForm.className = "addAlbum-form hidden";
			}
			else {
				addAlbumForm.className = "addAlbum-form";
			}
		}
	</script>
</body>
</html>