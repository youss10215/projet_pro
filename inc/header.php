<?php
require_once 'class/Cfg.php';
$user = AbstractUser::getUserSession(User::class);
$tabCategorie = Categorie::tab();
?> 
<header id="header" class="container-fluid pb-4">
    <div id="top-nav row">
        <div class="row justify-content-between pt-3 px-md-3 mb-3">
            <div class="col-5 col-md-4 col-lg-5 align-self-center d-none d-md-block pl-0">
                <ul class="social p-0 pl-lg-2 mr-5 d-md-inline d-none">
                    <li><i class="fab fa-facebook-f"></i></li>
                    <li><i class="fab fa-pinterest-p"></i></li>
                    <li><i class="fab fa-instagram"></i></li>
                    <li><i class="fab fa-linkedin"></i></li>
                </ul>
                <span class="d-lg-inline d-none">Tel : 06 12 60 49 44</span>
            </div>
            <div id="logo" class="d-md-inline">
            <a href="index.php">Sop'in</a>
            </div>
            <div class="col-4 col-lg-5 align-self-center text-right mr-3 mr-md-0">
                <ul class="profil m-0 list-unstyled list-inline">
                    <?php if ($user) {?>
                    <li class="list-inline-item align-middle">
                        <a href="logout.php">
                        <i class="fas fa-door-open"></i>
                        </a>
                    </li>
                    <?php }else {?>
                    <li class="list-inline-item align-middle">
                        <a href="login.php">
                        <i class="fas fa-user"></i>
                        </a>
                        <?php } ?>
                    </li>
                    <li class="list-inline-item align-middle">
                        <a href="panier.php">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <span id="box"><p id="number">0</p></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="stellarnav">
            <ul class="col-12">
                <li><a href="index.php">Accueil</a>
                </li>
                <?php foreach ($tabCategorie as $categorie) {?>
                <li>
                    <a href="javascript:categorie(<?= $categorie->id_categorie ?>)"><?= $categorie->nom ?></a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>