<?php

// Link
require_once("./conf/link.php");

if (check($_GET['email']) && check($_GET['token'])) {
	$email = secu($_GET['email']);
	$token = secu($_GET['token']);
	if (Check::cemail($email)) {
		if (Check::oublier($token, $email)) {
			?>
			<form action="./oublier.php?token=<?= $token ?>&email=<?= $email ?>" method="POST">
				<input type="password" name="passe" placeholder="Votre nouveau password." />
				<input type="submit" value="Réinitialser">
			</form>
			<?php
		}
		else
			echo "Erreur : Token existe pas.";
	}
	else
		echo "Erreur : Email existe pas.";
}
else
	redirection("./404.php");

?>