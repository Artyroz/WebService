<?php

// validation email
function email_validation($login, $email, $token) {
	$message = "Bienvenu ".$login.", pour valider votre compte cliquez sur ce lien : <br/><a href='".URL."validation.php?login=".$login."&token=".$token."'>".URL."validation.php?login=".$login."&token=".$token."</a>";
	$sujet = "Validation de votre compte jeux.";
	$header = "";
	$header = "From: Webmaster Site <".EMAIL.">\n";
	$header = $header."Content-type: text/html; charset=iso-8859-1\n";
	if (!mail($email, $sujet, $message, $header))
		echo "Erreur : Email non envoyer.";
}

// oublie email
function email_oublier($email, $token) {
	$message = "Vous venez de faire une demande de Reinitialisation de mot de passe : <br/><a href='".URL."initialise.php?email=".$email."&token=".$token."'>".URL."initialise.php?email=".$email."&token=".$token."</a>";
	$sujet = "Reinitialiser mot de passe.";
	$header = "";
	$header = "From: Webmaster Site <".EMAIL.">\n";
	$header = $header."Content-type: text/html; charset=iso-8859-1\n";
	if (!mail($email, $sujet, $message, $header))
		echo "Erreur : Email non envoyer.";
}

?>