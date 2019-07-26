<?php
require_once 'class/Cfg.php';
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
$nom = $categorie->nom;
$tabProduit = $categorie->getTabProduit();

?>
<!DOCTYPE html>
<html lang="fr">
    <?php require_once 'inc/head.php' ?>
<body>
    <?php  require_once 'inc/header.php' ?>
    <div class="container">
        <div class="link mb-4">
            <nav>
                <a href="index.php">
                    <span>Sop'in</span>
                </a>
                <span><?= $nom ?></span>
            </nav>
        </div>
        <div class="category my-5 py-2">
            <h2><?= $nom ?></h2>
        </div>
        <div class="all_products row"> 
            <?php foreach ($tabProduit as $produit) {
                $id = $produit->id_produit 
            ?>
            <div class="col-6 col-lg-4 pb-5 text-center">
                <div class="ih-item square effect6 colored top_to_bottom text-center" onclick="detail(<?= $id ?>)">
                    <a href="#">
                        <img  class="category_image" src="img/prod_<?= $id ?>_v.jpg" height="auto">
                        <div class="info"><p>Voir les détails</p></div>
                        
                    </a>
                </div>
                <div class="category-descrition">
                    <h5 class="name"><?= $produit->nom ?></h5>
                    <span class="marque"><?= Cfg::APP_TITRE ?></span>
                    <span class="price"><?= $produit->prix ?>€</span> 
                </div> 
            </div>
            <?php }?>  
        </div>
    </div> 
    <?php require_once 'inc/footer.php' ?> 
    <?php require_once 'inc/script.php' ?>
</body>
</html>