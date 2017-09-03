<!DOCTYPE html>
<html>
<head>
	<title>PROFILE / modify</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/Album/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Album/css/more.css">
</head>
<body>

	<ul class="nav nav-tabs">
	  	<li role="presentation"><a href="profile.php">Home</a></li>
	  	<li role="presentation"><a href="friends.php">Friends</a></li>
	  	<li role="presentation"><a href="photos.php">Photos</a></li>
	  	<li class="perfil_de" role="presentation">Perfil de <?php session_start(); echo $_SESSION['nickname']; ?></li>
	  	<li role="presentation" class="active"><a href="modify.php">M</a></li>
	</ul>

	<p>MODIFICAR PERFIL</p>
	<br>
	<p>foto de perfil . avatar</p>
	<form class="custom-file" title="joder" enctype="multipart/form-data" action="/Album/img.php" method="POST">
		<input name="uploadedfile" type="file"/>
		<input type="submit" value="Subir archivo"/>
	</form>

	<br>
	<p>diseño . colores</p>

</body>
</html>