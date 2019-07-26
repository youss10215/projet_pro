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
            <div class="product py-5">
                <div class="row position-relative">
                    <div class="product_image col-12 col-lg-7 col-xl-6">
                        <img src="img/prod_<?= $id_produit ?>_p.jpg" width="100%" height="auto" alt="">
                    </div>
                    <div class="product_description col-12 col-lg-5 col-xl-6">
                        <span class="product_marque"><?= Cfg::APP_TITRE ?></span>
                        <h1 class="product_name mb-5"><?= $produit->nom ?></h1>
                        <span class="product_price"><?= $produit->prix ?>€</span>
                        <div class="product_detail my-4">
                            <div>
                                <span class="detail_desc">Couleur :</span>
                                <span class="detail_property"><?= $produit->couleur ?></span>
                            </div>
                            <div>
                                <span class="detail_desc">Ref :</span>
                                <span class="detail_property"><?= $produit->ref ?></span>
                            </div> 
                            <div>
                                <span class="detail_desc">Dimension :</span>
                                <span class="detail_property"><?= $produit->dimension ?></span>
                            </div> 
                        </div>  
                        <span class="stock">En stock</span>
                        <div class="product_cart mt-3">
                            <form class="form_detail" name="form_detail"  method="post">
                                <input class="form_number mr-4 text-center" type="number" name="quantite" value="1" min="1" step="1"style="width:10%"/>
                                <input class="check_out detail_button" type="submit" name="submit" class="check_out" style="width:70%" value="Ajouter au panier"/>
                            </form>
                        </div>
                    </div>
                </div>
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
        </section>
    </div>
    <?php require_once 'inc/footer.php' ?>
    <?php require_once 'inc/script.php' ?>
</body>
</html>