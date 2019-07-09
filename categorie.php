<?php
require_once 'class/Cfg.php';
$tabCategorie = Categorie::tab();
// Récupération de l'id_categorie dans l'url
$opt = ['options'=>['min_range' => 1]];
$id_categorie = filter_input(INPUT_GET, 'id_categorie', FILTER_VALIDATE_INT, $opt);
if(!$id_categorie){
    header("Location:indispo.php");
    exit;
}
$categorie = new Categorie($id_categorie);
if(!$categorie->charger()){
    header('Location:indispo.php');
	exit;
}
$tabProduit = $categorie->getTabProduit();
?>
<!DOCTYPE html>
<html lang="fr">
    <?php require_once 'inc/head.php' ?>
<body>
    <?php require_once 'inc/header.php' ?>
    <a href="index.php">Accueil</a>
    <div><?= $categorie->nom ?></div>
    <?php foreach ($tabProduit as $produit) {?>
    <div onclick="detail(<?= $produit->id_produit ?>)">
        Nom:<?= $produit->nom ?></div>
    <?php }?>
    
<script src="js/categorie.js" type="text/javascript"></script>
<script src="js/index.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Stellanarv -->
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script type="text/javascript" src="js/stellarnav.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery('.stellarnav').stellarNav({
                theme:'light',
				breakpoint: 868,
                position: 'static'
			});
		});
	</script> 

</body>
</html>