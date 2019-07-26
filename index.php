<?php
require_once 'class/Cfg.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <?php require_once 'inc/head.php' ?>
<body>
    <?php require_once 'inc/header.php' ?>
    <h1>Architecture d'intérieur</h1>
    <div id="banner">
        <div id="carouselExampleIndicators" class="carousel slide pt-4" data-ride="carousel" data-interval="4000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/banner1.jpg" class="w-100" height="auto" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/banner2.jpg" class="w-100" height="auto" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/banner3.jpg" class="w-100" height="auto" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <section id="realisation"class="pt-5 pb-3">
        <div class="container py-0">
            <h3 class="section_title">Mes dernières réalisations</h3>
            <div class="card-group row text-center">
                <div class="card col-sm-12" style="margin-right:1px">
                    <img src="img/appt1.jpg" class="card-img-top" height="auto" alt="...">
                    <div class="card-body">
                    <p class="card-text font-weight-bold">Appartement 83m2 remanié</p>
                    </div>
                </div>
                <div class="card col-sm-12">
                    <img src="img/appt2.jpg" class="card-img-top" height="auto" alt="...">
                    <div class="card-body">
                    <p class="card-text font-weight-bold">Appartement 104m2 avec extension</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="meuble" class="pt-4">
        <div class="container py-0">
            <h3 class="section_title">Mes Meubles</h3> 
            <div class="row text-center">
                <div class="card col-6  col-lg-3"> 
                    <a href="javascript:detail(12)">
                    <img src="img/prod_12_v.jpg" class="card-img-top" height="auto">
                    <div class="card-body">
                        <h5 class="name card-title">Banc</h5>
                        <span class="marque"><?= Cfg::APP_TITRE ?></span>
                        <p class="price card-text">109,90€</p>
                    </a>
                    </div>
                </div>
                <div class="card col-6 col-lg-3">
                    <a href="javascript:detail(13)">
                    <img src="img/prod_13_v.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="name card-title">Banquette</h5>
                        <span class="marque"><?= Cfg::APP_TITRE ?></span>
                        <p class="price card-text">219,90€</p>
                    </a>
                    </div>
                </div>
                <div class="card col-6 col-lg-3">
                    <a href="javascript:detail(14)">
                    <img src="img/prod_14_v.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="name card-title">Chauffeuse</h5>
                        <span class="marque"><?= Cfg::APP_TITRE ?></span>
                        <p class="price card-text">199,90€</p>
                    </a>
                    </div>
                </div>
                <div class="card col-6 col-lg-3">
                    <a href="javascript:detail(6)">
                    <img src="img/prod_6_v.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="name card-title">Canapé</h5>
                        <span class="marque"><?= Cfg::APP_TITRE ?></span>
                        <p class="price card-text">599,99€</p>
                    </a>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <?php require_once 'inc/footer.php' ?>
    <?php require_once 'inc/script.php' ?>
</body>