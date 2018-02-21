<?php

// Link
require_once("./conf/link.php");

if (check($_GET['emaildemande'])) {
	$email = secu($_GET['emaildemande']);
	if (Check::cemail($email)){
		$token = alea();
		User::oublier($email, $token);
		email_oublier($email, $token);
		echo "Sucess : Un email vous a ete envoyer.";
	}
	else
		echo "Erreur : Cette email existe pas.";
}
else if (check($_GET['token']) && check($_GET['email']) && check($_POST['passe'])) {
	$token = secu($_GET['token']);
	$email = secu($_GET['email']);
	$passe = secu($_POST['passe']);
	if (Check::cemail($email)) {
		if (Check::oublier($token, $email)) {
			User::modifpass($email, $passe);
			echo "Sucess : Password modifier.";
		}
		else
			echo "Erreur : Token non valide.";
	}
	else
		echo "Erreur : Email invalide.";
}
else
	echo "Erreur : Champ Manquand.";

?>