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
				<center><h2 class="titulo">Profile</h2></center>
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
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<p>Description:</p>
			</div>
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
					$query_select = "SELECT * FROM album WHERE user = '$id';";
					$result_query_select = mysqli_query($conexion, $query_select);
					$n_albums = mysqli_num_rows($result_query_select);
					if(mysqli_num_rows($result_query_select) != 0) {
						$count = 1;
						for($c = 0; $c < $n_albums; $c++) {
							$row = mysqli_fetch_array($result_query_select);

							echo "<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'>\n" .
									"<div class='btn album'>\n" .
									"<center><span class='nameAlbum' onclick=\"cargarAlbum('" . $row['name'] . "');\">" . $row['name'] . "</span></center>\n" .
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
			<h4 class="modal-title" id="exampleModalLabel"><center>Create new Album</center></h4>
			</div>
			<div class="modal-body">
			<form>
				<div class="form-group">
				    <label for="nameAlbum" class="control-label">Name:</label>
				    <input type="text" class="form-control" id="nameAlbum">
				</div>
				<div class="form-group">
                    <label for="descriptAlbum" class="control-label">Description: *</label>
                    <textarea class="form-control" id="descriptAlbum"></textarea>
              	</div>
			</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-primary" onclick="createAlbum();">Create</button>
			</div>
		</div>
		</div>
	</div>
    <button></button>

    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	function createAlbum () {
    		var name = document.getElementById('nameAlbum').value;
    		var description = document.getElementById('descriptAlbum').value;
    		if(name.length > 0) {
    			$.ajax({
					url: "http://localhost/Album/C/addAlbum.php",
					data: {
						name:name,
						description:description,
						id:user
						},
					type: "POST",
					success: function(respuesta){
						if(respuesta[0] == '1' && respuesta[(respuesta.length - 1)]  == '1') {
							console.log('Descripción cargada');
							// var text = respuesta.substr(1, respuesta.length - 2);
							// document.getElementById('text').innerHTML = text;
							location.href = 'album.php';
						} else if(respuesta == 'fail') {
							console.log('Error al conectar con el servidor');
						} else if(respuesta == 'error') {
							console.log('Error al actualizar base de datos.');
						} else {
							console.log('Error desconocido');
						}
					}
				});
    		} else {
    			console.log('No se puede crear album sin nombre');
    		}
    		
    	}

    	function cargarAlbum(nameAlbum) {
    		// localStorage.setItem("albumName",nameAlbum);
    		location.href = "photos.php?visit=2&nein=" + nameAlbum;
    // 		$.ajax({
				// 	url: "http://localhost/Album/C/openAlbum.php",
				// 	data: {
				// 		name:nameAlbum,
				// 		id:user
				// 		},
				// 	type: "POST",
				// 	success: function(respuesta){
						

				// 		// if(respuesta[0] == '1' && respuesta[(respuesta.length - 1)]  == '1') {
				// 		// 	console.log('Descripción cargada');
				// 		// 	// var text = respuesta.substr(1, respuesta.length - 2);
				// 		// 	// document.getElementById('text').innerHTML = text;
				// 		// 	// location.href = 'album.php';
				// 		// } else if(respuesta == 'fail') {
				// 		// 	console.log('Error al conectar con el servidor');
				// 		// } else if(respuesta == 'error') {
				// 		// 	console.log('Error al actualizar base de datos.');
				// 		// } else {
				// 		// 	console.log('Error desconocido');
				// 		// }
				// 	}
				// });
    	}
    </script>

</body>
</html>
