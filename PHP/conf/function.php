<?php

// Check si la variable existe et si elle n'est pas null
function check($v) {
	if (isset($v) && !empty($v))
		return true;
	return false;
}

// Securiter des variables
function secu($v) {
	if (intval($v))
		return $v;
	$v = trim($v);
	$v = stripslashes($v);
	$v = htmlspecialchars($v);
	return $v;
}

// Chaine de caractère aléatoire
function alea() {
	$c = 'abcdefghijklmnopqrstuvwxyz1234567890';
	$v = str_shuffle($c);
	$v = substr($v, 0, 10);
	return $v;
}

function redirection($url, $time=0) {
	if (!headers_sent()){
		header("refresh: $time;url=$url");
		exit;
	}
	else
		echo '<meta http-equiv="refresh" content="'.$time.';url='.$url.'">';
}

?>