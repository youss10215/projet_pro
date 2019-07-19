<?php
require_once 'class/Cfg.php';
$panier = $_SESSION['id_produit'];
if(!isset($panier)){
    header("Location:panierVide.php");
    exit;
}
if (filter_input(INPUT_POST, 'submit')) {
    $total_commande = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $_SESSION['total'] = $total_commande;
    $panier;
    header('Location:commander.php');
	exit;
}
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
                <span>Panier</span>
            </nav>
        </div>
        <div class="my-5 py-2">
            <h2>Panier</h2>
        </div>
        <div class="panier">
            <?php
            if(!$panier){ 
            ?>
            <p>Votre panier est vide</p>
            <button class="back"><a href="index.php">Retour à l'accueil</a></button>
            <?php } else{ 
            ?>
            <div class="table_cart mb-4">
                <table class="table_product_cart">
                    <thead>
                        <tr>
                            <th class="cart_thumbnail"></th>
                            <th class="cart_name">Produit</th>
                            <th class="cart_price">Prix</th>
                            <th class="cart_quantity">Quantité</th>
                            <th class="cart_subtotal">Total</th>
                            <th class="cart_remove" ></th>
                        </tr>
                    </thead>
                    <tbody id="line_cart">
                    <?php
                    $total = 0;
                    foreach($panier as $element){
                        $id = $element[0]->id_produit;
                        $nom = $element[0]->nom;
                        $ref = $element[0]->ref;
                        $couleur = $element[0]->couleur;
                        $quantite = $element[1];
                        $prix = $element[0]->prix;
                        $sousTotal = $element[1] * $element[0]->prix;
                        $total += $sousTotal;
                    ?>
                        <tr>
                            <td class="cart_thumbnail text-center"><img src="img/prod_<?= $id ?>_t.jpg" alt=""></td>
                            <td class="cart_nom">
                                <span><?= $nom ?> -</span>
                                <span class="cart_ref"><?= $ref?> ,</span>
                                <span class="cart_couleur"><?= $couleur ?></span>
                            </td>
                            <td class="cart_price">
                                <span><?= $prix ?></span>
                                <span>€</span>
                            </td>
                            <td class="cart_quantity"><?= $quantite ?></td>
                            <td id="prix" class="cart_subtotal"><?= $sousTotal ?></td>
                            <td class="cart_remove" onclick="supprimerPanier(<?= $id ?>)"><i class="fas fa-times"></i></td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
            <div class="total_part row">
                <div class="cart_total col-6 offset-6">
                    <span class="cart_total_span">Total panier</span>
                    <table class="table_total mt-4">
                    <form name="form_panier" method="post">
                        <tbody>
                            <tr>
                                <th>Livraison</th>
                                <td>GRATUIT</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <input type="hidden" name="total" value="<?= $total ?>">
                                <td><?= $total ?>€</td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                    <input class="check_out" type="submit" name="submit"/>
                    </div> 
                    </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
<script src="js/panier.js" type="text/javascript"></script>
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
            position: 'static',
            phoneBtn: '0612604944',
            locationBtn: 'https://www.google.com/maps'
        });
    });
</script>
</html>