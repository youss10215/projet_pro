<?php
require_once 'class/Cfg.php';
$opt = ['options'=>['min_range' => 1]];
$id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, $opt);
if(!$id_produit){
    header("Location:indispo.php");
    exit;
}
$produit = new Produit($id_produit);
if(!$produit->charger()){
    header("Location:indispo.php");
    exit;
}
if (filter_input(INPUT_POST, 'submit')) {
    $quantite = filter_input(INPUT_POST, 'quantite', FILTER_VALIDATE_INT );
    if(isset($_SESSION ['id_produit'][$id_produit])){
        $_SESSION ['id_produit'][$id_produit][1] +=$quantite;
    }
    $_SESSION['id_produit'][$id_produit][] = $produit;
    $_SESSION ['id_produit'][$id_produit][] = $quantite;
    header("Location:panier.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Detail</title>
</head>
<body>
    <a href="index.php">Accueil</a>
    <div>Nom : <?= $produit->nom ?></div>
    <div>Couleur :<?= $produit->couleur ?></div>
    <div>Dimensions :<?= $produit->dimension ?></div>
    <div>Reférence :<?= $produit->ref ?></div>
    <div>Prix :<?= $produit->prix?></div>
    <div>Stock :<?= $produit->stock?></div>
    <form name="form_detail"  method="post">
        <input type="number" name="quantite" value="1" min="1" step="1"/><br/>
        <input type="submit" name="submit" value="Ajouter au panier" />
    </form>
    <button onclick="ajouter(<?= $produit->id_categorie ?>)">Ajouter</button>
    <button onclick="modifier(<?= $produit->id_produit ?>)">Modifier</button>
    <button onclick="supprimer(<?= $produit->id_produit ?>)">Supprimer</button>
<script src="js/detail.js" type="text/javascript"></script> 
</body>
</html>