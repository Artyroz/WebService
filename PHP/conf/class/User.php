<?php

// Class qui gere tout les elements de l'utilisateur
class User {

	// Function de connection
	public static function connect($login, $passe) {
		$r = Bdd::connect()->prepare("SELECT * FROM user WHERE login = :login");
		$r->bindParam(':login', $login, PDO::PARAM_STR, 55);
		$r->execute();
		if ($r->rowCount()) {
			$d = $r->fetch(PDO::FETCH_ASSOC);
			if (password_verify($passe, $d['passe'])) {
				if ($d['valide'] == 1)
					return $d;
				return 1; // Compte non valider
			}
			return 2; // Mauvais password
		}
		return 3; // Login existe pas
	}

	// Function d'enregistrement
	public static function inscrit($login, $passe, $email, $token) {
		$passe = password_hash($passe, PASSWORD_BCRYPT);
		$r = Bdd::connect()->prepare("INSERT INTO user (id, login, passe, token, rank, email, valide) VALUES ('', :login, :passe, :token, '0', :email, '0')");
		$r->bindParam(':login', $login, PDO::PARAM_STR, 55);
		$r->bindParam(':passe', $passe, PDO::PARAM_STR, 255);
		$r->bindParam(':token', $token, PDO::PARAM_STR, 15);
		$r->bindParam(':email', $email, PDO::PARAM_STR, 255);
		$r->execute();
	}

	// Function de validation
	public static function validation($login) {
		$valide = 1;
		$r = Bdd::connect()->prepare("UPDATE user SET valide=:valide WHERE login=:login");
		$r->bindParam(':valide', $valide, PDO::PARAM_INT);
		$r->bindParam(':login', $login, PDO::PARAM_STR, 55);
		$r->execute();
	}

	// Function de oublier passe
	public static function oublier($email, $token) {
		$r = Bdd::connect()->prepare("UPDATE user SET token=:token WHERE email=:email");
		$r->bindParam(':token', $token, PDO::PARAM_STR, 15);
		$r->bindParam(':email', $email, PDO::PARAM_STR, 255);
		$r->execute();
	}

	// Function modification de password
	public static function modifpass($email, $passe) {
		$passe = password_hash($passe, PASSWORD_BCRYPT);
		$r = Bdd::connect()->prepare("UPDATE user SET passe=:passe WHERE email=:email");
		$r->bindParam(':passe', $passe, PDO::PARAM_STR, 255);
		$r->bindParam('email', $email, PDO::PARAM_STR, 255);
		$r->execute();
	}

}

?>