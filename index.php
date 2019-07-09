<?php
require_once 'class/Cfg.php';
$user = AbstractUser::getUserSession(User::class);
$tabCategorie = Categorie::tab();
?>
<!DOCTYPE html>
<html lang="fr">
    <?php require_once 'inc/head.php' ?>
<body>
    <?php require_once 'inc/header.php' ?>
    <h1>Architecture d'intérieur</h1>
    <div id="carouselExampleIndicators" class="carousel slide pt-4 pb-3" data-ride="carousel" data-interval="4000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/banner1.jpg" class="d-block w-100" width="1054" height="612" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/banner2.jpg" class="d-block w-100" width="1054" height="612" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/banner3.jpg" class="d-block w-100" width="1054" height="612" alt="...">
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
    <section id="realisation"class="pt-5 pb-3">
        <div class="container py-0">
            <h3 class="sectionTitle">Mes dernières réalisations</h3>
            <div class="card-group">
                <div class="card">
                    <img src="img/appt.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Avant</h5>
                    <p class="card-text">Appartement 83m2 remanié</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/appt1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Après</h5>
                    <p class="card-text">Appartement 104m2 avec extension</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="meuble" class="pt-5">
        <div class="container py-0">
            <h3 class="sectionTitle">Mes Meubles</h3>  
            <div class="card-group">
                <div class="card">
                    <img src="img/prod_11_v.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Guéridon</h5>
                    <p class="card-text">A partir de 309,90€</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/prod_12_v.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Banc</h5>
                    <p class="card-text">A partir de 109,90€</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/prod_13_v.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Banquette</h5>
                    <p class="card-text">A partir de 219,90€</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/prod_14_v.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Chauffeuse</h5>
                    <p class="card-text">A partir de 199,90€</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
</body>