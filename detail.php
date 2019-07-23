<?php
require_once 'class/Cfg.php';
$user = AbstractUser::getUserSession(User::class);
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
<?php require_once 'inc/head.php' ?>
<html lang="fr">  
<?php require_once 'inc/header.php' ?>
<body>
    <div class="container">
        <div class="link mb-4">
            <nav>
                <a href="index.php">
                    <span>Sop'in</span>
                </a>
                <a href="javascript:categorie(<?= $produit->id_categorie ?>)">
                    <span><?= $produit->categorie->nom ?></span>
                </a>
                <span><?= $produit->nom ?></span>
            </nav>
        </div>
        <section>
            <button onclick="increaseCart()">Add to cart</button>
            <div class="product py-5 mt-4 mb-5">
                <div class="row position-relative">
                    <div class="product_image col-12 col-lg-7 col-xl-6">
                        <img src="img/prod_<?= $id_produit ?>_p.jpg" width="550" height="550" alt="">
                    </div>
                    <div class="product_description col-12 col-lg-5 col-xl-6">
                        <span class="product_marque"><?= Cfg::APP_TITRE ?></span>
                        <h1 class="product_name"><?= $produit->nom ?></h1>
                        <a href="#product_detail">Détails</a><br>
                        <span class="product_price"><?= $produit->prix ?>€</span><br>   
                        <span>En stock</span>
                        <div class="product_cart">
                        <form class="input-group" name="form_detail"  method="post">
                            <input type="number" name="quantite" value="1" min="1" step="1"style="width:10%"/><br/>
                            <input  type="submit" name="submit" class="check_out" value="Ajouter au panier"/>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product_detail">
                <h3 class="section_title">Description détaillée</h3>
                <div class="row">
                    <div class="product_detail_description col-8">
                        <div>Couleur :<?= $produit->couleur ?></div>
                        <div>Dimensions :<?= $produit->dimension ?></div>
                        <div>Reférence :<?= $produit->ref ?></div>
                    </div>
                    <div class="admin">
                        <?php if($user && $user->admin == 1 ){ ?>
                        <button onclick="ajouter(<?= $produit->id_categorie ?>)">Ajouter</button><br>
                        <button onclick="modifier(<?= $produit->id_produit ?>)">Modifier</button><br>
                        <button onclick="supprimer(<?= $produit->id_produit ?>)">Supprimer</button><br>
                        <button onclick="supprimerImage(event, <?= $produit->id_produit ?>)">Supprimer l'image</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script src="js/detail.js" type="text/javascript"></script> 
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