<?php

abstract class AbstractUser implements ORM {

	public $id_user;
	public $log;
	public $mdp;
	public $nom;
	public $prenom;

	public abstract function sauver();

	public static abstract function tab($where = 1, $orderBy = 1, $limit = null);

	public function charger() {
		// Hydrate $this en se basant sur sa PK.
		if (!$this->id_user)
			return false;
		$req = "SELECT * FROM user WHERE id_user={$this->id_user}";
		return DBMySQL::getInstance()->xeq($req)->ins($this);
	}

	public function supprimer() {
		// Supprimer l'enregistrement correspondant à $this.
		if (!$this->id_user)
			return false;
		$req = "DELETE FROM user WHERE id_user={$this->id_user}";
		return (bool) DBMySQL::getInstance()->xeq($req)->nb();
	}

	public function login() {
		// Suppose les propriétés log et mdp renseignées.
		// Retourne true ou false selon que le user a été logué (et hydraté) ou pas.
		if (!($this->log && $this->mdp))
			return false;
		$db = DBMySQL::getInstance();
		$req = "SELECT * FROM user WHERE log={$db->esc($this->log)}";
		if (!$obj = $db->xeq($req)->prem())
			return false;
		if (!password_verify($this->mdp, $obj->mdp))
			return false;
		$this->id_user = $obj->id_user;
		$this->charger();
		Session::getInstance()->set('id_user', $this->id_user);
		return true;
	}

	public static function getUserSession($userClass) {
		// Retourne une instance de la classe concrète $userClass (qui étend AbstractUser) chargée avec le user en session (ou null si aucun user en session).
		$user = new $userClass();
		if (!$user instanceof AbstractUser)
			return null;
		$user->id_user = Session::getInstance()->get('id_user');
		return $user->charger() ? $user : null;
	}

}
