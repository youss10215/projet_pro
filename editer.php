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
    $produit->stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_INT, $opt);
    if (!$produit->id_categorie || !$produit->categorie)
        $tabErreur[] = "La catégorie est absente ou invalide.";
    if (!$produit->nom || mb_strlen($produit->nom) > 50)
        $tabErreur[] = "Le nom est absent ou invalide.";
    if (!$produit->ref || mb_strlen($produit->ref) > 20 || $produit->refExiste())
        $tabErreur[] = "La référence est absente, invalide ou déjà existante.";
    if (!$produit->prix || $produit->prix < 0 || $produit->prix >= 10000)
		$tabErreur[] = "Le prix est absent ou invalide.";
    if (!$tabErreur) {       
    $produit->sauver();
    header("Location:index.php");
    }
}else {
	$produit->id_categorie = filter_input(INPUT_GET, 'id_categorie', FILTER_VALIDATE_INT, $opt);
	if (!$produit->id_categorie) {
		$produit->id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, $opt);
		if (!$produit->id_produit) {
			header('Location:indispo.php');
			exit;
		}
		if (!$produit->charger()) {
			header('Location:indispo.php');
			exit;
		}
	}
}
$tabCategorie = Categorie::tab(1, "nom");
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
        <input type="hidden" name="id_produit" value="<?= $produit->id_produit ?>"/>
        <div class="item">
        <label>Categorie</label>
            <select name="id_categorie">
            <?php
                foreach ($tabCategorie as $categorie) {
                    $selected = $categorie->id_categorie == $produit->id_categorie ? 'selected="selected"' : '';
            ?>
                <option value="<?= $categorie->id_categorie ?>" <?= $selected ?>><?= $categorie->nom ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class="item">
            <label>Nom</label>
            <input name="nom" value="<?= $produit->nom ?>" maxlength="50" required="required"/>
        </div>
        <div class="item">
            <label>Couleur</label>
            <input name="couleur" value="<?= $produit->couleur ?>" maxlength="20" required="required"/>
        </div>
        <div class="item">
            <label>Dimension</label>
            <input name="dimension" value="<?= $produit->dimension?>" maxlength="20" required="required"/>
        </div>
        <div class="item">
            <label>Référence</label>
            <input name="ref" value="<?= $produit->ref ?>" maxlength="20" required="required"/>
        </div>
        <div class="item">
            <label>Prix</label>
            <input type="number" name="prix" value="<?= $produit->prix ?>" min="0" max="9999.99" step="0.01" required="required"/>
        </div>
        <div class="item">
            <label>Stock</label>
            <input type="number" name="stock" value="<?= $produit->stock ?>" required="required"/>
        </div>
        <div class="item">
            <label>Photo (JPEG)</label>
            <input type="file" name="photo" onchange=""/>
            <input type="button" value="Parcourir..." onclick=""/>
        </div>
        <div class="item">
            <label></label>
            <input type="button" value="Annuler" onclick="annuler()"/>
            <input type="submit" name="submit" value="Valider"/>
        </div>
	</form>
    <script src="js/editer.js" type="text/javascript"></script>
</body>
</html>