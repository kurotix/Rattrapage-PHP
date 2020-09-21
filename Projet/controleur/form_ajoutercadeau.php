<?php
	
	session_start();

	$host = "localhost"; // ou 127.0.0.1
	$user = "root";
	$bdd = "projet"; // le nom de votre base de données
	$passwd = "";

	$co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");	

	if(isset($_POST["nomcad"])) {
	 // Permet d'ajouter un cadeau /!\ il faut entrer dans une liste'
		$liste = $_POST["liste"];
		$nomcad = $_POST["nomcad"];
		$des = $_POST["des"];
		$img = $_POST["img"]; 
		$lien = $_POST["lien"];
		
		}
	else	echo "Connexion pas réussi!";

		
		if($nomcad && $des && $img && $lien){
		// condition si tout les champs n'ont pas étaient complété'

			 $_SESSION['nomcad'] = $nomcad;
			 $_SESSION['liste'] = $liste;
			// incrémentation pour une insération en db
			 $nomcad = $_SESSION['nomcad'];
			 $liste = $_SESSION['liste'];


			$result = mysqli_query($co,"SELECT * FROM cadeau WHERE NomCadeau='$nomcad'");
			// une fois le formulaire validé les infos sont inséré en db
		    if(mysqli_num_rows($result)!=1) {
		       		$requete = "INSERT INTO cadeau(NomCadeau,Description,Image,LienWeb) VALUES ('$nomcad' ,'$des','$img','$lien')";
		       		$result = mysqli_query($co,$requete);
		       		$Mail= mysqli_insert_id($co);


		       		$requete1 = "INSERT INTO contient(IdCadeau,IdListe,Reservation) VALUES 
		       		((SELECT IdCadeau FROM cadeau WHERE NomCadeau = '$nomcad'), (SELECT IdListe FROM liste WHERE NomListe='$liste'),false)";
		       		$result1 = mysqli_query($co,$requete1);
		       		$Mail= mysqli_insert_id($co);

		       		echo "Bonjour, Vous avez bien ajouter le cadeau: ".$nomcad." dans la liste: ".$liste;
		     	}
		}
		else echo"Ohh mon dieu, vous n'avez pas compléter tout les champs";
    
   

    mysqli_close($co);
	// la partie du bas concerne la vue
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  href="..\modele\lecss.css" /> 

</head>
<body>
					<br><br><br>
			<form method="post" action="..\vue\membre.php">
				<input type="submit" name="retour" value="Retour">
			</form>
</body>


