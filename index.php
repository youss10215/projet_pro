<?php
require_once 'class/Cfg.php';
$tabCategorie = Categorie::tab();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
<?php foreach ($tabCategorie as $categorie) {?>
    <div onclick="categorie(<?= $categorie->id_categorie ?>)">
    <?= $categorie->nom ?></div>
<?php }?>
    <a href="panier.php">Panier</a>
    <a href="editer.php">Editer</a>
<script src="js/index.js" type="text/javascript"></script>
</body>