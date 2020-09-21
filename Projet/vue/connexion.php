<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1−strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">


<head>
	<meta charset="UTF-8"></meta>
	<link rel="stylesheet" href="..\modele\lecss.css" /> 

		<h1>S'inscrire/Se connecter</h1>

</head>

<body>

	<div class = connexion>
		<h2>Se connecter</h2>
			<form method="post" action="..\controleur\form_connexion.php">
				<p>email : </p>
				<p><input type="email" name="Mail"></p>

				<p>Mot de passe :	</p>
				<p><input type="password" name="mdp"></p>
				<p><input type="submit" name="connecter" value="Se connecter" /></p>
			</form>
	</div>

</body>
