<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1−strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">


<head>
	<meta charset="UTF-8"></meta>
	<link rel="stylesheet" href="..\modele\lecss.css" /> 

		<h1>S'inscrire/Se connecter</h1>
		
</head>

<body>

	<div class = inscription>
		<h2>S'incrire</h2>
			<form method="post" action="..\controleur\form_incription.php">
				<p>email :</p>
				<p><input type="email" name="Mail"></p>
		
				<p>Mot de passe :	</p>
				<p><input type="password" name="mdp"></p>
		
				<p>Nom :	
				<p><input type="text" name="NomMembre"></p>
		
				<p>Prenom :	</p>
				<p><input type="text" name="PrenomMembre"></p>

				<p><input type="submit" name="inscrire" value="S'inscrire" /></p>	
						
			</form>
			
			<form method="post" action="..\vue\connexion.php">
				<p><input type="submit" name="connecter" value="Se connecter"/></p>
			</form>
	</div>
</body>
