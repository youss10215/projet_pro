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
    if (!$produit->ref || mb_strlen($produit->ref) > 20 || $produit->refExiste())
        $tabErreur[] = "* La référence est absente, invalide ou déjà existante.";
    if (!$tabErreur) {       
        $db->start();
		$produit->sauver();
        $upload = new Upload('photo', Cfg::IMG_TAB_MIME);
        // L'upload est facultatif.
		if ($upload->codeErreur === UPLOAD_ERR_NO_FILE) {
			$db->commit();
			header('Location:index.php');
			exit;
		}
    // Un upload a bien eu lieu.
		$tabErreur = $upload->tabErreur;
		if (!$tabErreur) {
			$imageJPEG = new ImageJPEG($upload->cheminServeur);
			$imageJPEG->copier(Cfg::IMG_P_LARGEUR, Cfg::IMG_P_HAUTEUR, "img/prod_{$produit->id_produit}_p.jpg");
            $imageJPEG->copier(Cfg::IMG_V_LARGEUR, Cfg::IMG_V_HAUTEUR, "img/prod_{$produit->id_produit}_v.jpg", AbstractImage::COVER);
            $imageJPEG->copier(Cfg::IMG_T_LARGEUR, Cfg::IMG_T_HAUTEUR, "img/prod_{$produit->id_produit}_t.jpg", AbstractImage::CONTAIN);
			$tabErreur = $imageJPEG->tabErreur;
			if (!$tabErreur) {
				$db->commit();
				header('Location:index.php');
				exit;
			}
		}
		$db->rollback();
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
$id = file_exists("img/prod_{$produit->id_produit}_p.jpg") ? $produit->id_produit : 0;
$maj = !$id ?: (new SplFileInfo("img/prod_{$id}_v.jpg"))->getMTime();
?>
<!DOCTYPE html>
<html lang="fr">
    <?php require_once 'inc/head.php' ?>
<body>
    <?php  require_once 'inc/header.php' ?>
    <div class="container">
        <div class="link mb-4">
            <nav>
                <a href="index.php">
                    <span>Sop'in</span>
                </a>
                <span>Edition</span>
            </nav>
        </div>
        <div class="my-5 py-2">
            <h2>Editer un prduit</h2>
        </div>
        <div class="row">
            <div class="form_form col-6">
                <div class="erreur"><?= implode('<br/>', $tabErreur) ?></div>
                <form name="form_editer" action="editer.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_produit" value="<?= $produit->id_produit ?>"/>
                        <div class="form-group">
                            <label for="categorie">Categorie</label>
                            <select class="custom-select" id="categorie" name="id_categorie">
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
                        <label>Nom</label>
                        <input class="form-control" name="nom" value="<?= $produit->nom ?>" maxlength="50" required="required"/>
                    
                        <label>Couleur</label>
                        <input class="form-control" name="couleur" value="<?= $produit->couleur ?>" maxlength="20" required="required"/>
                
                        <label>Dimension</label>
                        <input class="form-control" name="dimension" value="<?= $produit->dimension?>" maxlength="20" required="required"/>
                    
                        <label>Référence</label>
                        <input class="form-control" name="ref" value="<?= $produit->ref ?>" maxlength="20" required="required"/>
                    
                        <label>Prix</label>
                        <input class="form-control" type="number" name="prix" value="<?= $produit->prix ?>" min="0" max="9999.99" step="0.01" required="required"/>
                    
                        <label>Stock</label>
                        <input class="form-control" type="number" name="stock" value="<?= $produit->stock ?>" required="required"/>
                
                        <label>Photo (JPEG)</label>
                        <input class="form-control" type="file" name="photo" onchange="afficherPhoto(this.files)"/>
                        <input class="form-control" type="button" value="Parcourir..." onclick="this.form.photo.click()"/>
                    
                        <input type="button" value="Annuler" onclick="annuler()"/>
                        <input type="submit" name="submit" value="Valider"/>
                </form>
            </div>
            <div id="vignette" class="col-6 align-self-center" style="background-image:url('img/prod_<?= $id ?>_v.jpg?maj=<?= $maj ?>')"></div>
        </div>
    </div>
<script src="js/editer.js" type="text/javascript"></script>
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
            breakpoint: 992,
            position: 'static',
            phoneBtn: '0612604944',
            locationBtn: 'https://www.google.com/maps'
        });
    });
</script>
<script>
    const MAX_FILE_SIZE = <?= Upload::maxFileSize() ?>;
    const TAB_MIME = ['<?= implode("','", Cfg::IMG_TAB_MIME) ?>'];
</script>
</html>