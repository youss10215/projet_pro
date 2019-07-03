<?php
require_once 'class/Cfg.php';
$opt = ['options'=>['min_range' => 1]];
$id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, $opt);
unset($_SESSION['id_produit'][$id_produit]);
