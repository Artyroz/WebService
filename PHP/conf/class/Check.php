<?php

// check les elements
class Check {

	// function qui check le login
	public static function user($login) {
		$r = Bdd::connect()->prepare("SELECT * FROM user WHERE login = :login");
		$r->bindParam(':login', $login, PDO::PARAM_STR, 55);
		$r->execute();
		if ($r->rowCount())
			return true;
		return false;
	}

	// function qui check l'email
	public static function cemail($email) {
		$r = Bdd::connect()->prepare("SELECT * FROM user WHERE email = :email");
		$r->bindParam(':email', $email, PDO::PARAM_STR, 55);
		$r->execute();
		if ($r->rowCount())
			return true;
		return false;
	}

	// function qui check la validation
	public static function token($token, $login) {
		$r = Bdd::connect()->prepare("SELECT token FROM user WHERE login=:login");
		$r->bindParam(':login', $login, PDO::PARAM_STR, 55);
		$r->execute();
		$d = $r->fetch(PDO::FETCH_ASSOC);
		if ($d['token'] == $token)
			return true;
		return false;
	}

	// function qui check le token
	public static function oublier($token, $email) {
		$r = Bdd::connect()->prepare("SELECT token FROM user WHERE email=:email");
		$r->bindParam(':email', $email, PDO::PARAM_STR, 255);
		$r->execute();
		$d = $r->fetch(PDO::FETCH_ASSOC);
		if ($d['token'] == $token)
			return true;
		return false;
	}

}

?>