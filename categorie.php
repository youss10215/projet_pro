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
            breakpoint: 992,
            position: 'static',
            phoneBtn: '0612604944',
            locationBtn: 'https://www.google.com/maps'
        });
    });
</script> 

</body>
</html>