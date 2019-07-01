<?php

class Produit implements ORM {

    public $id_produit;
    public $id_categorie;
    public $nom;
    public $couleur;
    public $dimension;
    public $ref;
    public $prix;
    public $stock;
    private $categorie = null;

    public function __construct($id_produit = null, $id_categorie = null, $nom = null, $couleur = null, $dimension = null, $ref = null, $prix = null, $stock = null) {
        $this->id_produit = $id_produit;
        $this->id_categorie = $id_categorie;
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->dimension = $dimension;
        $this->ref = $ref;
        $this->prix = $prix;
        $this->stock = $stock;
        }

        
    function charger(){
        // Hydrate $this en se basant sur sa PK.
        if(!$this->id_produit)
            return false;
        $req = "SELECT * FROM produit WHERE id_produit={$this->id_produit}";
        return DBMySQL::getInstance()->xeq($req)->ins($this);
    }
    function sauver(){
        // Persister $this en se basant sur sa PK
        $db = DBMySQL::getInstance();
        $id_produit = $this->id_produit ?: 'DEFAULT';
        $req = "INSERT INTO produit VALUES ({$id_produit}, {$this->id_categorie}, {$db->esc($this->nom)}, {$db->esc($this->couleur)}, {$db->esc($this->dimension)}, {$db->esc($this->ref)}, {$this->prix}, {$this->stock}) ON DUPLICATE KEY UPDATE id_categorie = {$this->id_categorie}, nom = {$db->esc($this->nom)}, couleur = {$db->esc($this->couleur)}, dimension = {$db->esc($this->dimension)}, ref = {$db->esc($this->ref)}, prix = {$this->prix}, stock = {$this->stock}";
        $db->xeq($req);
        $this->id_produit = $this->id_produit ?: $db->pk();
        return $this;
    }
    function supprimer(){
        // Supprimer l'enregistrement correspondant à $this.
        if(!$this->id_produit)
            return false;
        $req = "DELETE  FROM produit WHERE id_produit={$this->id_produit}";
        return (bool) DBMySQL::getInstance()->xeq($req)->nb();
        
    }
    static function tab($where = 1, $orderBy = 1, $limit = null){
        // Retourne un tableau d'enregistrements sous la forme d'instances.
        $req = "SELECT * FROM produit WHERE {$where} ORDER BY{$orderBy}".($limit ? "LIMIT {$limit}" : '');
        return DBMySQL::getInstance()->xeq($req)->tab(self::class);
    }
        
    public function get_categorie() {
        if (!$this->categorie) {
            $req = "SELECT * FROM categorie WHERE id_categorie = {$this->id_categorie}";
            $this->categorie = DBMySQL::getInstance()->xeq($req)->prem(Categorie::class);
            }
            return $this->categorie;
    }

    public function __get($nom) {
            $methode = "get_{$nom}";
            return $this->$methode();
    }

    public function refExiste() {
            $db = DBMySQL::getInstance();
            $id_produit = $this->id_produit ?: 0;
            //$id_produit = $this->id_produit ? $this->id_produit : 0;
            $req = "SELECT * FROM produit WHERE ref = {$db->esc($this->ref)} AND id_produit != {$id_produit}";
            return (bool) $db->xeq($req)->prem(self::class);
    }
    

}
        