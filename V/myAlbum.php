<?php 
	// session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Album</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<!-- <link rel="stylesheet" href="../css/more.css"> -->
    <script src="../js/jquery.js"></script>
</head>
<body>
	<header class="container-fluid">
		<div class="container-fluid row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<center><h2 class="titulo">Photos</h2></center>
			</div>
		</div>
	</header>
	<br>
	<br>
	<br>
	<div class='container'>
		<div class="container-fluid row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<!-- <img src="multimedia/Esteban/profile.png" alt="" style='border-radius: 0%; height: 250px;'> -->
				<?php
					$nickname = $_SESSION['nickname'];
					$avatar = $_SESSION['avatar']; // Es la ruta donde está el avatar actual

					echo "<script>var user = '" . $nickname . "';</script>";
					if($avatar == 'noone') {
						echo "<img class='avatar' src='' height='128' width='128'>";
					}
					else {
						echo "<img class='avatar' src='/Album/$avatar' height='128' width='128'>";
					}
					echo "<h1 class='avatar_title'>$nickname</h1>";
				?>
			</div>
			<!-- <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<p>Description:</p>
			</div> -->
		</div>
	</div>
	<br><br>
	<!-- Albumes -->
	<div class='container'>
		<div class="container-fluid row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<button type="button" class="btn addAlbum" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
					<center><span class='glyphicon glyphicon-plus plusAlbum'></span></center>
				</button>
			</div>

			<!-- Se añaden los álbumes con JavaScript o PHP -->
			<?php 
				include "../C/conexion.php";

				$conexion = mysqli_connect($host, $user, $pass, $db);
				if(!$conexion) {
					echo "<script>console.log('Error al conectarse a la base de datos (img.php)');</script>";
				} 
				else {
					$id = $_SESSION['id'];
					$albumName = $_GET['nein'];
					// echo "<script>alert('" . $albumName . "');</script>";
					// $query_select = "SELECT id FROM album WHERE user = '$id' AND name = '$albumName';";
					$query_select = "SELECT *
								FROM album_photo AS AP, album AS A, photo AS P
								WHERE A.id = AP.id_album AND P.id = AP.id_photo AND A.name = '$albumName';";
					$result_query_select = mysqli_query($conexion, $query_select);
					$n_photos = mysqli_num_rows($result_query_select);
					if(mysqli_num_rows($result_query_select) != 0) {
						$count = 1;
						for($c = 0; $c < $n_photos; $c++) {
							$row = mysqli_fetch_array($result_query_select);

							echo "<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>\n" .
									"<div class='btn album'>\n" .
									"<center><span class='nameAlbum' onclick=\"cargarAlbum('" . $row['img'] . "');\">" . $row['img'] . "</span></center>\n" .
								"</div>\n</div>\n";
							$count = $count + 1;
							if($count % 4 == 0) {
								echo "<br><br>";
							}
						}	
					}
				}
			?>
		</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="exampleModalLabel"><center>Upload Photo</center></h4>
			</div>
			<div class="modal-body">
			<form id="form" enctype="multipart/form-data" method="POST">
				<div class="form-group">
				    <label for="namePhoto" class="control-label">Title:</label>
				    <input type="text" class="form-control" id="namePhoto">
				</div>
				<div class="form-group">
                    <label for="descriptPhoto" class="control-label">Description: *</label>
                    <textarea class="form-control" name="descriptPhoto" id="descriptPhoto"></textarea>
              	</div>
              	<div class="form-group">
				    <label for="photo">Select File</label>
				    <input type="file" name="uploadedfile" id="photo">
				    <p class="help-block">Max size 5Mb</p>
			  	</div>
			  	</div>
			<!-- <div class="modal-footer"> -->
			<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
			<!-- <button type="submit" class="btn btn-primary" onclick="uploadPhoto();">Create</button> -->
			<button type="submit" class="btn btn-primary">Create</button>

			<!-- </div> -->
			</form>
			
		</div>
		</div>
	</div>

	

    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	var form = document.getElementById('form');

    	function getParameterByName(name) {
		    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		    results = regex.exec(location.search);
		    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
		}
    	form.setAttribute('action','../C/addPhoto.php?nein=' + getParameterByName('nein'));
    </script>

</body>
</html>
