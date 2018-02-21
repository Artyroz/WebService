<?php

// link
require_once("./conf/link.php");

if (check($_GET['login']) && check($_GET['token'])) {
	$login = secu($_GET['login']);
	$token = secu($_GET['token']);
	if (Check::user($login)) {
		if (Check::token($token, $login)){
			User::validation($login);
			echo "Sucess : Votre compte a ete valider.";
		}
		else
			echo "Erreur : Validation token different.";
	}
	else
		echo "Erreur : Login existe pas.";
}
else
	redirection("./404.php");

?>