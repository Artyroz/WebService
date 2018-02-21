<?php

// link fichier
require_once("./conf/link.php");

if (check($_POST['LoginConnect']) && check($_POST['PasseConnect'])) {
	// securiser les variables
	$login = secu($_POST['LoginConnect']);
	$passe = secu($_POST['PasseConnect']);
	// Envoi a la classe User
	$user = User::connect($login, $passe);
	// check les differentes possibiliter
	if ($user == 1) {
		// Compte non valider
		echo "Erreur : Votre compte n'a pas ete valider.";
	}
	else if ($user == 2) {
		// Mauvais password
		echo "Erreur : Mauvais mot de passe.";
	}
	else if ($user == 3) {
		// Login existe pas
		echo "Erreur : Le login n'existe pas.";
	}
	else
		echo "Id : ".$user['id']."|User : ".$user['login']."|Rank : ".$user['rank'].";";
}
else
	echo "Erreur : Champs Manquant.";

?>