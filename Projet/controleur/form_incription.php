<?php

	$host = "localhost"; // ou 127.0.0.1
	$user = "root";
	$bdd = "projet"; // le nom de votre base de données
	$passwd = "";

	$co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");	
	// récupération des données du formulaire qui seront intégré dans la db correspondante
	if(isset($_POST["Mail"])) {
			$Mail = $_POST["Mail"];
	     	$mdp = $_POST["mdp"];
	     	$NomMembre = $_POST["NomMembre"];
	     	$PrenomMembre = $_POST["PrenomMembre"];
			
		}
	else	echo "Connexion pas réussi!";
		

	if($Mail && $mdp && $NomMembre && $PrenomMembre){

		$result = mysqli_query($co,"SELECT * FROM membre WHERE Mail='$Mail'");
		// si la valeur de résulte est égal à 1 alors il existe déjà un utilisateur au niveau de la bd et si le résultat est égal à 0 on génére un nouveau user
	    if(mysqli_num_rows($result)!=1) {
	       		$requete = "INSERT INTO membre(Mail,mdp,NomMembre,PrenomMembre,Actif) VALUES ('$Mail','$mdp','$NomMembre','$PrenomMembre',true)";
	       		$result = mysqli_query($co,$requete);
	       		$Mail= mysqli_insert_id($co);
	       		echo "Bonjour ".$NomMembre." Vous vous êtes bien inscrit ";
	     	}

	    else echo "Bonjour . Vous vous êtes bien inscrit ";
	     	
    }
    else echo"Veuillez saisir tous les champs";

    mysqli_close($co);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  href="..\modele\lecss.css" /> 

</head>
<body>
		</br></br></br>
		<form method="post" action="..\vue\acceuil.php">
			<input type="submit" name="retour" value="Retour">
		</form>
</body>


