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
    foreach($panier as $element){
        var_dump($element[1]);
        $prix = $element[1] * $element[0]->prix;
        var_dump($prix);
    ?>
<div id="prix"><?= $prix ?></div>
    <?php } ?>
<div id="total"></div>
</form>
<a href="index.php">Accueil</a>
</body>
<script>
    let prix = document.querySelectorAll("#prix");
    console.log(prix); 
    let total = 0;
    for(price of prix){
        total += Number(price.textContent);
    }
    document.querySelector("#total").innerHTML = total;
    console.log(typeof total);
</script>
<script src="js/index.js" type="text/javascript"></script>
</html>