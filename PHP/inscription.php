<?php

// link fichier
require_once("./conf/link.php");

if (check($_POST['LoginInscrit']) && check($_POST['PasseInscrit']) && check($_POST['PasseReInscrit']) && check($_POST['EmailInscrit']) && check($_POST['EmailReInscrit'])) {
	$login = secu($_POST['LoginInscrit']);
	$passe = secu($_POST['PasseInscrit']);
	$passere = secu($_POST['PasseReInscrit']);
	$email = secu($_POST['EmailInscrit']);
	$emailre = secu($_POST['EmailReInscrit']);
	$token = alea();
	if ($passe == $passere) {
		if ($email == $emailre) {
			if (!Check::user($login)) {
				if (!Check::cemail($email)) {
					User::inscrit($login, $passe, $email, $token);
					email_validation($login, $email, $token);
					echo "Sucess : Une email de validation vous est envoyer.";
				}
				else
					echo "Erreur : L'email existe déjà.";
			}
			else
				echo "Erreur : Le login existe déjà.";
		}
		else
			echo "Erreur : Email.";
	}
	else
		echo "Erreur : Mot de passe.";
}
else
	echo "Erreur : Champ Manquand.";

?>