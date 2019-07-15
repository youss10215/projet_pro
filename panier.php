<?php
require_once 'class/Cfg.php';
$panier = $_SESSION['id_produit'];
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
            <div class="table_cart mb-4">
                 <?php
                    if($panier){
                    foreach($panier as $element){
                        $id = $element[0]->id_produit;
                        $nom = $element[0]->nom;
                        $ref = $element[0]->ref;
                        $couleur = $element[0]->couleur;
                        $quantite = $element[1];
                        $prix = $element[0]->prix;
                        $sousTotal = $element[1] * $element[0]->prix;
                        
                ?>
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
                    <tbody>
                        <tr>
                            <td class="cart_thumbnail"><img src="img/prod_<?= $id ?>_t.jpg" alt=""></td>
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
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="total_part row">
                <div class="empty_total col-6"></div>
                <div class="cart_total col-6">
                    <span class="cart_total_span">Total panier</span>
                    <table class="table_total mt-4">
                        <tbody>
                            <tr>
                                <th>Livraison</th>
                                <td>GRATUIT</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td id="total"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <button class="check_out" onclick="commander(queryString)">valider la commande</button>
                    </div>
                </div>
            </div>
            <?php } else{?>
                <p>Votre panier est vide</p>
            <?php } ?>
        </div>
    </div>
</body>
<script>
    let prix = document.querySelectorAll("#prix"); 
    let total = 0;
    for(price of prix){
        total += Number(price.textContent);
    }
    document.querySelector("#total").innerHTML = total;
    let queryString = "?" + total;
    console.log(queryString);
</script>
<script src="js/panier.js" type="text/javascript"></script>
</html>