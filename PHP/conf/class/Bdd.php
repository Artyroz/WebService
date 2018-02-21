<?php

// Connection avec la Bdd
class Bdd {
	private static $co = NULL;
	public static function connect(){
		try {
			if(!self::$co) {
				self::$co = new PDO(DSN, USER, PASSE);
				self::$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return self::$co;
		}
		catch (PDOException $e) {
			echo "Impossible de se connecter : ".$e->getMessage();
		}
	}
}

?>