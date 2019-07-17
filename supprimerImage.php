<?php
require_once('class/Cfg.php');
if (!AbstractUser::getUserSession(User::class))
	exit;
$id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, ['min_range' => 1]);
if ($id_produit) {
	@unlink("img/prod_{$id_produit}_v.jpg");
    @unlink("img/prod_{$id_produit}_p.jpg");
    @unlink("img/prod_{$id_produit}_t.jpg");
}