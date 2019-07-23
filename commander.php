<?php
require_once 'class/Cfg.php';
$total_commande =$_SESSION['total'];
$panier= $_SESSION['id_produit'];
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