<?php
require_once 'class/Cfg.php';
$tabErreur = [];
$user = new User();
if (filter_input(INPUT_POST, 'connexion')) {
	// Récupérer les données POST.
	$user->log = filter_input(INPUT_POST, 'log', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$user->mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	// Vérifier les données POST.
	if (!$user->log)
		$tabErreur[] = "Identifiant absent.";
	if (!$user->mdp)
		$tabErreur[] = "Mot de passe absent.";
	if (!$tabErreur && $user->login()) {
		header('Location:index.php');
		exit;
	}
	$tabErreur[] = "* Identifiant ou mot de passe incorrect.";
}
if (filter_input(INPUT_POST, 'register')) {
	// Récupérer les données POST.
	$register_log = filter_input(INPUT_POST, 'log', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $register_mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $_SESSION['log'] = $register_log;
    $_SESSION['mdp'] = $register_mdp;
    header('Location:formulaire.php');
	exit;
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
                <span>Mon compte</span>
            </nav>
        </div>
        <div class="my-5 py-2">
            <h2>Mon compte</h2>
        </div>
        <div class="row">
            <div class="col-6">
                <h5>Connexion</h5>
                <div class="erreur_login"><?= implode('<br/>', $tabErreur) ?></div>
                <form name="form_login" action="login.php" method="post">
                    <div class="mb-3">
                        <input class="form-control" name="log" placeholder="Identifiant" size="20" maxlength="20" required="required"/>
                    </div>
                    <div class="">
                        <input class="form-control" type="password" name="mdp" placeholder="Mot de passe" maxlength="250" required="required"/>
                    </div>
                    <div class="">
                        <input class="check_out form-control" type="submit" name="connexion" value="Connexion"/>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <h5>S'enregistrer</h5>
                <div class="erreur_login"></div>
                <form name="form_register" action="login.php" method="post">
                    <div class="mb-3">  
                        <input class="form-control" name="log" placeholder="E-mail" maxlength="250" required="required"/>
                    </div>
                    <div class="">
                        <input class="form-control" type="password" name="mdp" placeholder="Mot de passe" maxlength="250" required="required"/>
                    </div>
                    <div class="">
                        <input class="check_out form-control" type="submit" name="register" value="S'enregister"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once 'inc/footer.php' ?>
    <?php require_once 'inc/script.php' ?>
</body>
</html>
