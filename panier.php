<?php
require_once 'class/Cfg.php';
$panier = $_SESSION['id_produit'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
</head>
<body>
    <?php
    if($panier){
    foreach($panier as $element){
        var_dump($element[0]->id_produit);
        var_dump($element[1]);
        $prix = $element[1] * $element[0]->prix;
        $nom = $element[0]->nom;
    ?>
<div class="produit">
    <div><?= $nom ?></div>
    <div id="prix"><?= $prix ?></div>
    <button onclick="supprimerPanier(<?= $element[0]->id_produit ?>)">Supprimer</button>
</div>
    <?php } ?>
    <?php }else{?>
        <div>Votre panier est vide</div>
        <?php } ?>
<div>TOTAL</div>
<div id="total"></div>
</form>
<a href="index.php">Accueil</a>
<button onclick="commander(queryString)">Commander</button>
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