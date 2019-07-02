<?php
require_once 'class/Cfg.php';
// Récupération de l'id_categorie dans l'url
$opt = ['options'=>['min_range' => 1]];
$id_categorie = filter_input(INPUT_GET, 'id_categorie', FILTER_VALIDATE_INT, $opt);
if(!$id_categorie){
    header("Location:indispo.php");
    exit;
}

// Récupération de l'id_categorie pour afficher le nom
$categorie = new Categorie($id_categorie);
if(!$categorie->charger()){
    header('Location:indispo.php');
	exit;
}

// Récupération des produits appartenant à la catégorie
$tabProduit = $categorie->getTabProduit();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Categorie</title>
</head>
<body>
    <a href="index.php">Accueil</a>
    <div><?= $categorie->nom ?></div>
    <?php foreach ($tabProduit as $produit) {?>
    <div onclick="detail(<?= $produit->id_produit ?>)">
        Nom:<?= $produit->nom ?></div>
    <?php }?>
    
<script src="js/categorie.js" type="text/javascript"></script> 
</body>
</html>