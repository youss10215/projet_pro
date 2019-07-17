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
                <img src="img/banner1.jpg" class="w-100" height="700" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/banner2.jpg" class="w-100" height="700" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/banner3.jpg" class="w-100" height="700" alt="...">
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
            <div class="card-group text-center">
                <div class="card" style="margin-right:1px">
                    <img src="img/appt.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <p class="card-text">Appartement 83m2 remanié</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/appt1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <p class="card-text">Appartement 104m2 avec extension</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="meuble" class="pt-4">
        <div class="container py-0">
            <h3 class="section_title">Mes Meubles</h3> 
            <div class="row">
                <div class="card-group text-center">
                    <div class="card">
                        <a href="javascript:detail(11)" class="index-card">
                        <img src="img/prod_11_v.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="name card-title">Guéridon</h5>
                            <span class="marque"><?= Cfg::APP_TITRE ?></span>
                            <p class="price card-text">309,90€</p>
                        </a>
                        </div>
                    </div>
                    <div class="card">
                        <a href="javascript:detail(12)">
                        <img src="img/prod_12_v.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="name card-title">Banc</h5>
                            <span class="marque"><?= Cfg::APP_TITRE ?></span>
                            <p class="price card-text">109,90€</p>
                        </a>
                        </div>
                    </div>
                    <div class="card">
                        <a href="javascript:detail(13)">
                        <img src="img/prod_13_v.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="name card-title">Banquette</h5>
                            <span class="marque"><?= Cfg::APP_TITRE ?></span>
                            <p class="price card-text">219,90€</p>
                        </a>
                        </div>
                    </div>
                    <div class="card">
                        <a href="javascript:detail(14)">
                        <img src="img/prod_14_v.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="name card-title">Chauffeuse</h5>
                            <span class="marque"><?= Cfg::APP_TITRE ?></span>
                            <p class="price card-text">199,90€</p>
                        </a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
<script src="js/index.js" type="text/javascript"></script>
<script src="js/categorie.js" type="text/javascript"></script>
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
            breakpoint: 891,
            position: 'static',
            phoneBtn: '0612604944',
            locationBtn: 'https://www.google.com/maps'
        });
    });
</script>
</body>