<?php
require_once 'class/Cfg.php';
$panier = $_SESSION['id_produit']; 
var_dump($panier);
foreach($panier as $element){
    $prix = $element[1] * $element[0]->prix;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commander</title>
</head>
<body> 
    
<div>TOTAL : </div> 
</body>
</html>