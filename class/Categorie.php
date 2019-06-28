<?php

class Categorie {

    public $id_categorie;
    public $nom;

    public function __construct($id_categorie = null, $nom = null) {
        $this->id_categorie = $id_categorie;
        $this->nom = $nom;
    }
    
    function charger(){
        // Hydrate $this en se basant sur sa PK.
        if(!$this->id_categorie)
            return false;
        $req = "SELECT * FROM categorie WHERE id_categorie={$this->id_categorie}";
        return DBMySQL::getInstance()->xeq($req)->ins($this);
    }
    function sauver(){
        // Persister $this en se basant sur sa PK
        $db = DBMySQL::getInstance();
        $id_categorie = $this->categorie ?: 'DEFAULT';
        $req = "INSERT INTO categorie VALUES ({$id_categorie}, {$db->esc($this->nom)}) ON DUPLICATE KEY UPDATE nom = {$db->esc($this->nom)}";
        $db->xeq($req);
        $this->id_categorie = $this->id_categorie ?: $db->pk();
        return $this;
    }
    function supprimer(){
        // Supprimer l'enregistrement correspondant à $this.
        if(!$this->id_categorie)
            return false;
        $req = "DELETE * FROM categorie WHERE id_produit={$this->id_categorie}";
        return (bool) DBMySQL::getInstance()->xeq($req)->nb();
        
    }
    static function tab($where = 1, $orderBy = 1, $limit = null){
        // Retourne un tableau d'enregistrements sous la forme d'instances.
        $req = "SELECT * FROM categorie WHERE {$where} ORDER BY {$orderBy}".($limit ? "LIMIT {$limit}" : '');
        return DBMySQL::getInstance()->xeq($req)->tab(self::class);
    }

    public function getTabProduit() {
        $req = "SELECT * FROM produit WHERE id_categorie = {$this->id_categorie} ORDER BY nom";
        return DBMySQL::getInstance()->xeq($req)->tab(Produit::class);
        
    }
        
}