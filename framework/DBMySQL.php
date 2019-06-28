<?php

class DBMySQL implements DB {

	private static $instance; // Instance unique.
	private static $DSN; // DSN.
	private static $log; // Identifiant utilisateur.
	private static $mdp; // Mot de passe.
	private static $opt = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; // Options de connexion.
	private $db; // Instance de PDO.
	private $jeu; // Recordset après une requête SELECT.
	private $nb; // Nombre de lignes affectées par la dernière requête.

	private function __construct() {
		// Créer la connexion PDO.
		if (!self::$DSN)
			exit("DSN non défini.");
		try {
			$this->db = new PDO(self::$DSN, self::$log, self::$mdp, self::$opt);
		} catch (PDOException $e) {
			echo "{$e->getMessage()}<br/>";
			exit("Connexion DB impossible.");
		}
	}

	public static function getInstance() {
		// Retourner une instance de DBMySQL.
		// Design Pattern Singleton pour garantir une unique instanciation de DBMySQL donc une unique connexion PDO.
		return self::$instance ?: self::$instance = new DBMySQL();
	}

	public static function setDSN($dbName, $log, $mdp, $host = 'localhost') {
		// Définir définitivement le DSN.
		if (self::$DSN)
			exit("DSN déjà défini.");
		self::$DSN = "mysql:dbname={$dbName};host={$host};charset=utf8mb4";
		self::$log = $log;
		self::$mdp = $mdp;
	}

	public function esc($exp) {
		// Retourne l'expression $exp protégée (échappée) pour l'utiliser dans une requête SQL.
		// Retourne 'NULL' si $exp=null.
		return $exp === null ? 'NULL' : $this->db->quote($exp);
	}

	public function xeq($req) {
		// Exécuter la requête SQL $req selon son type.
		// Retourne $this pour chaînage.
		try {
			if (mb_stripos(trim($req), 'SELECT') === 0) {
				$this->jeu = $this->db->query($req);
				$this->nb = $this->jeu->rowCount();
			} else {
				$this->jeu = null; // Sécurité.
				$this->nb = $this->db->exec($req);
			}
		} catch (PDOException $e) {
			exit("{$req}<br/>{$e->getMessage()}");
		}
		return $this;
	}

	public function nb() {
		return $this->nb;
	}

	public function tab($class = 'stdClass') {
		// A n'utiliser qu'après l'exécution d'une requête SELECT.
		// Retourne un tableau d'instances de $class correspondant aux enregistrements sélectionnés.
		if (!$this->jeu)
			return [];
		$this->jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
		return $this->jeu->fetchAll();
	}

	public function prem($class = 'stdClass') {
		// A n'utiliser qu'après l'exécution d'une requête SELECT ne sélectionnant à priori qu'un unique enregistrement.
		// Retourne le premier des enregistrements sélectionnés sous la forme d'une instance de $class.
		if (!$this->jeu)
			return null;
		$this->jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
		return $this->jeu->fetch() ?: null;
	}

	public function ins($obj) {
		// Hydrate $obj à partir du premier enregistrement présent dans le jeu en cours.
		// Retourne true ou false selon que l'hydratation a réussi ou pas.
		if (!$this->jeu)
			return false;
		$this->jeu->setFetchMode(PDO::FETCH_INTO, $obj);
		return (bool) $this->jeu->fetch();
	}

	public function pk() {
		// Retourne la dernière PK auto-incrémentée.
		return $this->db->lastInsertId();
	}

	public function start() {
		// Débuter une transaction.
		// Retourne true ou false.
		return $this->db->beginTransaction();
	}

	public function savepoint($label) {
		// Créer un point de restauration nommé $label.
		// Retourne $this.
		$req = "SAVEPOINT {$label}";
		return $this->xeq($req);
	}

	public function rollback($label = null) {
		// Restaurer la DB à son état en début de transaction ou au point de restauration $label.
		// Retourne $this.
		$req = $label ? "ROLLBACK TO {$label}" : "ROLLBACK";
		return $this->xeq($req);
	}

	public function commit() {
		// Valider la transaction.
		// Retourne true ou false.
		return $this->db->commit();
	}

	public function query($sql, $data = array() ){
		$req = $this->db->prepare($sql);
		$req->execute($data);
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

}
