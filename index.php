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
    <title>Accueil</title>
</head>
<body>
<header id="header" class="container-fluid pb-4">
    <div id="top-nav">
        <div class="row justify-content-between pt-3 px-md-3">
            <div class="col-6 d-none d-lg-block pl-0">
                <ul class="social p-0 pl-lg-2 mr-5 d-lg-inline d-none">
                    <li><i class="fab fa-facebook-f"></i></li>
                    <li><i class="fab fa-pinterest-p"></i></li>
                    <li><i class="fab fa-instagram"></i></li>
                    <li><i class="fab fa-linkedin"></i></li>
                </ul>
                <span clas="d-lg-inline d-none">Tel : 06 12 60 49 44</span>
            </div>
            <div class="col-6 align-self-end text-right mr-3 mr-md-0">
                <ul class="profil pr-sm-3 m-0 list-unstyled list-inline">
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
            <div class="col-12 d-lg-none">
                <a href="/"><img src="https://www.ateliergermain.com/wp-content/themes/ateliergermain/assets/images/logotxt.svg" 
                class="logomobile m-auto d-block"></a>
            </div>
        </div>
    </div>
    <div class="btn-mobile d-lg-none position-fixed">
        <button type="button" data-toggle="collapse" data-target="#navbar_wrapper" aria-expanded="false" aria-controls="navbar_wrapper">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    <div class="row align-items-center mt-4">
       <div class="col-12 p-sm-0">
           <div id="nav_wrapper" class="collapse d-lg-block col-12">
               <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
                   <div class="nav_content col-sm p-0">
                       <ul id="menu_header" class="navbar-nav m-auto no-gutters">
                           <li class="col-lg align-self-center text-lg-center">Accueil</li>
                           <li class="col-lg align-self-center text-lg-center">Réalisation avant/après</li>
                           <li>
                                <a class="">
                                    <img class="logo" src="img/logo.png" alt="">
                                </a>
                            </li>
                           <li class="col-lg align-self-center text-lg-center">Meubles sur mesure</li>
                           <li class="col-lg align-self-center text-lg-center">Mes créations</li>
                       </ul>
                   </div>
               </nav>
           </div>
       </div> 
    </div>
</header>
    <a href="panier.php">Panier</a>
    <?php if($user){ ?>
    <a href="logout.php">Deconnexion</a>
    <div style="font-weight:bold">Bonjour <?= $user->prenom ?></div>
    <?php } else{ ?>
    <a href="login.php">Connexion  </a>
    <?php } ?>
<?php foreach ($tabCategorie as $categorie) {?>
    <div onclick="categorie(<?= $categorie->id_categorie ?>)">
    <?= $categorie->nom ?></div>
<?php }?>
<script src="js/index.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>