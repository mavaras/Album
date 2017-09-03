<!DOCTYPE html>
<html lang="en">
<head>
	<title>PROFILE / friends</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/Album/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Album/css/more.css">
</head>
<body>
	<ul class="nav nav-tabs">
	  	<li role="presentation"><a href="profile.php">Home</a></li>
	  	<li role="presentation" class="active"><a href="friends.php">Friends</a></li>
	  	<li role="presentation"><a href="photos.php">Photos</a></li>
	  	<li class="perfil_de" role="presentation">Perfil de <?php session_start(); echo $_SESSION['nickname']; ?></li>
	  	<li role="presentation"><a href="modify.php">M</a></li>
	</ul>
	<br><br>
	<div class="col-lg-6">
    <div class="input-group">
      	<input type="text" class="form-control" placeholder="Search for...">
      	<span class="input-group-btn">
        	<button class="btn btn-default" type="button">Go!</button>
      	</span>
    </div>
  	</div>

	<script src='/Album/js/jquery.js'></script>
	<script src='/Album/js/bootstrap.min.js'></script>
</body>
</html>