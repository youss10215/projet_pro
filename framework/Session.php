<?php

class Session implements SessionHandlerInterface, ORM {

	public $sid; // PHPSESSID
	public $data; // Données sérialisées et désérialisées automatiquement par PHP.
	public $date_maj; // Date MySQL de dernière mise à jour.
	public $delai; // Temps écoulé depuis la dernière mise à jour. Public sinon FETCH_INTO de charger() impossible.
	private $timeout; // Duréee (s) maximale de session. Illimitée si null.
	private static $instance; // Instance singleton.

	private function __construct() {

	}

	public static function getInstance($timeout = null) {
		if (!self::$instance) {
			self::$instance = new Session();
			self::$instance->timeout = $timeout;
			// AVANT session_start(), SI cookie présent ET S'IL existe une session MAIS expirée en DB, ALORS détruire la session.
			self::$instance->checkTimeout();
			session_set_save_handler(self::$instance);
			session_start();
		}
		return self::$instance;
	}

	private function checkTimeout() {
		// A appeler impérativement AVANT session_start().
		$session_name = session_name();
		if (isset($_COOKIE[$session_name])) {
			$this->sid = $_COOKIE[$session_name];
			$this->charger();
			if ($this->timeout && $this->delai && $this->delai > $this->timeout)
				$this->destroy($this->sid);
		}
	}

	public function get($cle) {
		return isset($_SESSION[$cle]) ? $_SESSION[$cle] : null;
	}

	public function set($cle, $val) {
		$_SESSION[$cle] = $val;
	}

	public function charger() {
		// Hydrate $this en se basant sur sa PK.
		$db = DBMySQL::getInstance();
		$req = "SELECT *, TIMESTAMPDIFF(SECOND, date_maj, NOW()) delai FROM session WHERE sid={$db->esc($this->sid)}";
		$db->xeq($req)->ins($this);
		return $db->xeq($req)->ins($this);
	}

	public function sauver() {
		// Persister $this en se basant sur sa PK.
		$db = DBMySQL::getInstance();
		$req = "INSERT INTO session VALUES({$db->esc($this->sid)}, {$db->esc($this->data)}, DEFAULT) ON DUPLICATE KEY UPDATE data={$db->esc($this->data)}, date_maj=DEFAULT";
		return $db->xeq($req);
	}

	public function supprimer() {
		// Supprimer l'enregistrement correspondant à $this.
		$db = DBMySQL::getInstance();
		$req = "DELETE FROM session WHERE sid={$db->esc($this->sid)}";
		return (bool) $db->xeq($req)->nb();
	}

	public static function tab($where = 1, $orderBy = 1, $limit = null) {
		// Retourne un tableau d'enregistrements sous la forme d'instances.
		$req = "SELECT * FROM session WHERE {$where} ORDER BY {$orderBy}" . ($limit ? " LIMIT {$limit}" : '');
		return DBMySQL::getInstance()->xeq($req)->tab(self::class);
	}

	public function open($save_path, $session_name) {
		return true;
	}

	public function close() {
		return true;
	}

	public function read($session_id) {
		$this->sid = $session_id;
		return $this->charger() ? $this->data : '';
	}

	public function write($session_id, $session_data) {
		$this->sid = $session_id;
		$this->data = $session_data;
		$this->sauver();
		return true;
	}

	public function destroy($session_id) {
		$this->sid = $session_id;
		$session_name = session_name();
		// Supprimer le cookie du navigateur.
		setcookie($session_name, '', time() - 3600, '/');
		// Supprimer la clé du tableau des cookies du serveur Apache.
		unset($_COOKIE[$session_name]);
		// Supprimer la session de la DB.
		$this->supprimer();
		// RAZ $this
		$this->sid = null;
		$this->data = null;
		return true;
	}

	public function gc($maxlifetime) {
		// Voir php.ini :
		// session.gc_probability
		// session.gc_divisor
		// session.gc_maxlifetime (inutilisé ici)
		if (!$this->timeout)
			return true;
		$req = "DELETE FROM session WHERE TIMESTAMPDIFF(SECOND, date_maj, NOW()) > {$this->timeout}";
		return (bool) DBMySQL::getInstance()->xeq($req)->nb();
	}

}
