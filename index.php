<?php
require_once 'class/Cfg.php';
$user = AbstractUser::getUserSession(User::class);
$tabCategorie = Categorie::tab();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <a href="panier.php">Panier</a>
    <?php if($user){ ?>
    <a href="logout.php">Deconnexion</a>
    <div style="font-weight:bold">Bonjour <?= $user->prenom ?></div>
    <?php } else{ ?>
    <a href="login.php">Connexion</a>
    <?php } ?>
<?php foreach ($tabCategorie as $categorie) {?>
    <div onclick="categorie(<?= $categorie->id_categorie ?>)">
    <?= $categorie->nom ?></div>
<?php }?>
<script src="js/index.js" type="text/javascript"></script>
</body>