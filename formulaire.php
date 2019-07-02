<?php
require_once 'class/Cfg.php';
$tabErreur = [];
$user = new User();
if (filter_input(INPUT_POST, 'submit')) {
  $user->nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $user->prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $user->telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$user->log = filter_input(INPUT_POST, 'log', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $user->mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  if (!$user->nom)
		$tabErreur[] = "Nom absent.";
	if (!$user->mdp)
    $tabErreur[] = "Prénom absent.";
  if (!$user->telephone)
    $tabErreur[] = "Téléphone absent.";
  if (!$user->log)
		$tabErreur[] = "Identifiant absent.";
	if (!$user->mdp)
    $tabErreur[] = "Mot de passe absent.";
  
  $user->sauver();
  $user->crypterMdp();
  header('Location:login.php');
     
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
</head>
<body>
<div class="categorie">Créez votre compte</div>
    <div class="erreur"><?= implode('<br/>', $tabErreur) ?></div>
    <form name="form_formulaire" method="post">
        <div class="item">
            <label>Nom</label>
            <input name="nom" value="" maxlength="50" required="required"/>
        </div>
        <div class="item">
            <label>Prénom</label>
            <input name="prenom" value="" maxlength="20" required="required"/>
        </div>
        <div class="item">
            <label>Telephone</label>
            <input type="tel" name="telephone" value="" maxlength="20" required="required"/>
        </div>
        <div class="item">
            <label>E-mail</label>
            <input type="email" name="log" value="" maxlength="30" required="required" multiple/>
        </div>
        <div class="item">
            <label>Mot de passe</label>
            <input type="password" name="mdp" value="" maxlength="255"  required="required"/>
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