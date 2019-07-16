<?php
require_once 'class/Cfg.php';
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
            <p>Votre panier est vide</p>
            <button class="back"><a href="index.php">Retour à l'accueil</a></button>
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
            position: 'static'
        });
    });
</script> 
</html>