<?php

class User {
	public $name,
		   $nickname,
		   $id,
		   $mail,
		   $pass,
		   $avatar,
		   $rol,
		   $friends; // Array??

	public function set_values($name,
		   					   $nickname,
		   					   $mail,
					           $pass,
		   					   $avatar,
		   					   $rol) {
		$this->set_nickname($nickname);
		$this->set_name($name);
		$this->set_mail($mail);
		$this->set_avatar($avatar);
		$this->set_pass($pass);
	}

	public function show_user() {
		echo "<br>" . $this->get_nickname() . "<br>";
		echo $this->get_name() . "<br>";
		echo $this->get_mail() . "<br>";
		echo $this->get_avatar() . "<br>";
	}

	public function create($cnx) { // Obligatorio llamar a set_values antes de esta función
		$query_insert = "INSERT INTO user (name, nickname, email, pass, avatar) 
						 VALUES ('$this->name',
						 		 '$this->nickname',
						 		 '$this->mail',
						 		 '$this->pass', 
						 		 '$this->avatar');";
		$result_query_insert = mysqli_query($cnx, $query_insert);
		if($result_query_insert) {
			echo "<script>console.log('Usuario creado/registrado correctamente');</script>";
			return 'register';
		} 
		else {
			echo "<script>console.log('Usuario no creado/registrado');</script>";
			return 'no_register';
		}
	}

	public function update() {

	}

	public function delete() {

	}

	public function get_nickname() { return $this->nickname; }
	public function set_nickname($nm) {	$this->nickname = $nm; }
	public function get_mail() { return $this->mail; }
	public function set_mail($m) { $this->mail = $m; }
	public function get_name() { return $this->name; }
	public function set_name($n) { $this->name = $n; }
	public function get_avatar() { return $this->avatar; }
	public function set_avatar($a) { $this->avatar = $a; }
	public function get_pass() { return $this->pass; }
	public function set_pass($p) { $this->pass = $p; }
}

?>