<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link rel="stylesheet" type="text/css" href="..\modele\lecss.css" /> 

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
 	<title>Liste de Noel</title>

  	<form method="post" action="..\controleur\form_deconnexion.php">
		<p align = right><input type="submit" name="deconnecter" value="Déconnecter" /></p>
	</form>

</head>

<body>
	<p> Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>. </p>
		<br>
	<p> <?php session_start();	echo "Bienvenue à vous ".$_SESSION['Mail'];?></p>
	
	<div class="a">
		<h2>Supprimer membre dans un Groupe</h2>
			
			<form method="post" action="..\controleur\form_supprimermembre.php">
				<p>NomGroupe :</p>
				<p><input type="text" name="grp"></p>
				<p>MailPersonne:</p>
				<p><input type="email" name="mail"></p>
				<p><input type="submit" name="Créer" value="Supprimer" /></p>
			</form>

				<br><br><br>
			<form method="post" action="..\vue\membre.php">
				<input type="submit" name="retour" value="Retour">
			</form>

	</div>

</body>

</html>