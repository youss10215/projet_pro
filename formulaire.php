<?php
require_once 'class/Cfg.php';
$register_log = ($_SESSION['log']);
$register_mdp = ($_SESSION['mdp']);
$tabErreur = [];
$user = new User();
if (filter_input(INPUT_POST, 'submit')) {
  $user->nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $user->prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $user->telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$user->log = filter_input(INPUT_POST, 'log', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $user->mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    if (!$user->nom)
		$tabErreur[] = "* Nom absent.";
	if (!$user->mdp)
    $tabErreur[] = "* Prénom absent.";
    if (!$user->telephone)
    $tabErreur[] = "* Téléphone absent.";
    if (!$user->log || $user->logExiste())
    $tabErreur[] = "* Email absent ou déjà existant.";
	if (!$user->mdp)
    $tabErreur[] = "* Mot de passe absent.";
    if (!$tabErreur) { 
        $user->sauver();
        $user->crypterMdp();
        header('Location:login.php');
    }
  }

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
                <span>Créer mon compte</span>
            </nav>
        </div>
        <div class="mt-5 mb-4 py-2">
            <h2>Créer mon compte</h2>
        </div>
        <div class="row">
            <div class="form_form col-12 col-lg-6">
                <div class="erreur" style="color:red"><?= implode('<br/>', $tabErreur) ?></div>
                <form name="form_formulaire" method="post">
                    <input class="form-control" name="nom" value="" placeholder="Nom" maxlength="50" required="required"/>
                    <input class="form-control" name="prenom" value="" placeholder="Prénom" maxlength="20" required="required"/>
                    <input class="form-control" type="tel" name="telephone" value="" placeholder="Téléphone" maxlength="20" required="required"/>
                    <input class="form-control" type="email" name="log" value="<?= $register_log ?>" placeholder="E-mail" maxlength="30" required="required" multiple/>
                    <input class="form-control" type="password" name="mdp" value="<?= $register_mdp ?>" placeholder="Mot de passe" maxlength="255"  required="required"/>
                    <div class="">
                    <input class="check_out" type="submit" name="submit" value="S'inscrire"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once 'inc/footer.php' ?>
    <?php require_once 'inc/script.php' ?>
</body>
</html>