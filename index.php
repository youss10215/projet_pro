<?php
require_once 'class/Cfg.php';
$user = AbstractUser::getUserSession(User::class);
$tabCategorie = Categorie::tab();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/meuble.css" rel="stylesheet" type="text/css"/>
    <!-- Stellarnav -->
    <link rel="stylesheet" type="text/css" media="all" href="css/stellarnav.css">
    <title>Accueil</title>
</head>
<body>
<header id="header" class="container-fluid pb-4">
    <div id="top-nav row">
        <div class="row justify-content-between pt-3 px-md-3 mb-3">
            <div class="col-5 align-self-center d-none d-md-block pl-0">
                <ul class="social p-0 pl-lg-2 mr-5 d-md-inline d-none">
                    <li><i class="fab fa-facebook-f"></i></li>
                    <li><i class="fab fa-pinterest-p"></i></li>
                    <li><i class="fab fa-instagram"></i></li>
                    <li><i class="fab fa-linkedin"></i></li>
                </ul>
                <span class="d-lg-inline d-none">Tel : 06 12 60 49 44</span>
            </div>
            <div id="logo" class="d-md-inline">
            <span>Sop'in</span>
            </div>
            <div class="col-5 align-self-center text-right mr-3 mr-md-0">
                <ul class="profil m-0 list-unstyled list-inline">
                    <li class="list-inline-item align-middle">
                        <a href="panier.php">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="list-inline-item align-middle">
                        <a href="login.php">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="stellarnav">
            <ul class="col-12">
                <li><a href="">Projet</a></li>
                <?php foreach ($tabCategorie as $categorie) {?>
                <li><a href="javascript:categorie(<?= $categorie->id_categorie ?>)"><?= $categorie->nom ?></a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</header>
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
				breakpoint: 772,
                position: 'static'
			});
		});
	</script>
	<!-- required -->
</body>