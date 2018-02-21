<?php

// Variable de type configuration
$Bdd = "Webservice";
$BddHost = "localhost";
$BddUser = "root";
$BddPasse = "root";
$BddDsn = "mysql:dbname=".$Bdd.";host=".$BddHost."";

$EmailEnvoi = "artyrozz@gmail.com";
$UrlSite = "http://webservice:80/";

// Define de connection
define("DSN", $BddDsn);
define("USER", $BddUser);
define("PASSE", $BddPasse);

define("URL", $UrlSite);
define("EMAIL", $EmailEnvoi);

?>