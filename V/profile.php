<!DOCTYPE html>
<html lang="en">
<head>
	<title>PROFILE / home</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/Album/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Album/css/more.css">
</head>
<body>
	<ul class="nav nav-tabs">
	  	<li role="presentation" class="active"><a href="profile.php">Home</a></li>
	  	<li role="presentation"><a href="friends.php">Friends</a></li>
	  	<li role="presentation"><a href="photos.php">Photos</a></li>
	  	<li class="perfil_de" role="presentation">Perfil de <?php session_start(); echo $_SESSION['nickname']; ?></li>
	  	<li role="presentation"><a href="modify.php">M</a></li>
	  	<li role="presentation"><a href="/Album/C/logout.php">S</a></li>
	</ul>

	<!-- Foto de perfil
	Biografía
	etc. -->

	<form enctype="multipart/form-data" action="/Album/img.php" method="POST">
		<input name="uploadedfile" type="file"/>
		<input type="submit" value="Subir archivo"/>
	</form>

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

	<div class="form-group">
		<div>
			<p id='text' style='text-align: center;'></p>
		</div>
		<label for="description">Biography:</label>
  		<textarea class="form-control" rows="5" id="description" placeholder='Add description...'></textarea>
		<button class='btn btn-primary' onclick='description(2);'>Guardar</button>
	</div>

	<script src='/Album/js/jquery.js'></script>
	<script src='/Album/js/bootstrap.min.js'></script>
	<script>
		function description(ejecucion) {
			if(ejecucion == 1) {
				$.ajax({
					url: "http://localhost/Album/controller/optionSQL.php",
					data: {
						user:user,
						ejecucion:1
						},
					type: "POST",
					success: function(respuesta){
						if(respuesta[0] == '1' && respuesta[(respuesta.length - 1)]  == '1') {
							console.log('Descripción cargada');
							var text = respuesta.substr(1, respuesta.length - 2);
							document.getElementById('text').innerHTML = text;
						} else if(respuesta == 'fail') {
							console.log('Error al conectar con el servidor');
						} else if(respuesta == 'error') {
							console.log('Error al actualizar base de datos.');
						} else {
							console.log('Error desconocido');
						}
					}
				});
			} else if (ejecucion == 2) {
				var text = document.getElementById('description').value;
				$.ajax({
					url: "http://localhost/Album/controller/optionSQL.php",
					data: {
						text:text,
						user:user,
						ejecucion:2
						},
					type: "POST",
					success: function(respuesta){
						if(respuesta == 'insert') {
							console.log('Descripción actualizada!');
							description(1);
						} else if(respuesta == 'fail') {
							console.log('Error al conectar con el servidor');
						} else if(respuesta == 'error') {
							console.log('Error al actualizar base de datos.');
							// alert(respuesta);
						} else {
							console.log('Error desconocido');
							// alert(respuesta);
						}
					}
				});
			}
		}
		description(1);
	</script>
</body>
</html>
