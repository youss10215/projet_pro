<?php
require_once 'class/Cfg.php';
$tabErreur = [];
$user = new User();
if (filter_input(INPUT_POST, 'submit')) {
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
	$tabErreur[] = "Identifiant ou mot de passe incorrect.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<div class="erreur"><?= implode('<br/>', $tabErreur) ?></div>
    <form name="form_login" action="login.php" method="post">
        <div class="item">
            <label>Identifiant</label>
            <input name="log" size="20" maxlength="20" required="required"/>
        </div>
        <div class="item">
            <label>Mot de passe</label>
            <input type="password" name="mdp" maxlength="250" required="required"/>
        </div>
        <div class="item">
            <label></label>
            <input type="submit" name="submit" value="Connexion"/>
        </div>
    </form>
    <a href="formulaire.php">S'inscrire</a>
</body>
</html>
