<?php

class Misc {

	private function __construct() {
		// 100% statique.
	}

	public static function crypter($table, $colPk, $colMdp) {
		$db = DBMySQL::getInstance();
		$req = "SELECT * FROM {$table} WHERE {$colMdp} IS NOT NULL";
		$tab = $db->xeq($req)->tab();
		foreach ($tab as $obj) {
			$mdp = password_hash($obj->$colMdp, PASSWORD_DEFAULT);
			$req = "UPDATE {$table} SET {$colMdp}={$db->esc($mdp)} WHERE {$colPk}={$obj->$colPk}";
			$db->xeq($req);
		}
	}

}
