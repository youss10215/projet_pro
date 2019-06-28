<?php
require_once 'class/Cfg.php';
$db = DBMySQL::getInstance();
$opt = ['options' => ['min_range' => 1]];
$tabErreur = [];
$produit = new Produit();

if (filter_input(INPUT_POST, 'submit')) {
    $produit->id_produit = filter_input(INPUT_POST, 'id_produit', FILTER_VALIDATE_INT, $opt);
	$produit->id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_VALIDATE_INT, $opt);
    $produit->nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $produit->couleur = filter_input(INPUT_POST, 'couleur', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $produit->dimension = filter_input(INPUT_POST, 'dimension', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$produit->ref = filter_input(INPUT_POST, 'ref', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $produit->prix = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_FLOAT);   
    $produit->sauver();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Editer</title>
    <link href="css/meuble.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="categorie">Editer un produit</div>
    <div class="erreur"><?= implode('<br/>', $tabErreur) ?></div>
    <form name="form_editer" action="editer.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produit" value=""/>
        <div class="item">
            <label>Catégorie</label>
            <select name="id_categorie">
            </select>
        </div>
        <div class="item">
            <label>Nom</label>
            <input name="nom" value="" maxlength="50" required="required"/>
        </div>
        <div class="item">
            <label>Couleur</label>
            <input name="couleur" value="" maxlength="20" required="required"/>
        </div>
        <div class="item">
            <label>Dimension</label>
            <input name="dimension" value="" maxlength="20" required="required"/>
        </div>
        <div class="item">
            <label>Référence</label>
            <input name="ref" value="" maxlength="20" required="required"/>
        </div>
        <div class="item">
            <label>Prix</label>
            <input type="number" name="prix" value="" min="0" max="9999.99" step="0.01" required="required"/>
        </div>
        <div class="item">
            <label>Photo (JPEG)</label>
            <input type="file" name="photo" onchange=""/>
            <input type="button" value="Parcourir..." onclick=""/>
        </div>
        <div class="item">
            <label></label>
            <input type="button" value="Annuler" onclick=""/>
            <input type="submit" name="submit" value="Valider"/>
        </div>
	</form>
</body>
</html>