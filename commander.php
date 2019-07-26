<?php
require_once 'class/Cfg.php';
$total_commande =$_SESSION['total'];
$panier= $_SESSION['id_produit'];
if(!isset($panier)){
    header("Location:index.php");
    exit;
}
if (filter_input(INPUT_POST, 'submit')) {
    unset($_SESSION['id_produit']);
    header('Location:index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
    <?php require_once 'inc/head.php' ?>
<body>
  
    <div class="container">
        <div class="my-5 py-2">
            <h2>Commande validée</h2>
        </div>
            <p >Votre commande a bien été enregistrée. Le montant total s'éléve à
            <span class="font-weight-bold"><?= $total_commande ?>€</span>
            </p>
            <form name="form_commander"  method="post">
                <input class="back" type="submit" name="submit" value="Retour à l'accueil" />
            </form>
        </div>
</body>
</html>