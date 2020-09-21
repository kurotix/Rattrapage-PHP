<?php
	
	session_start();

	$host = "localhost"; // ou 127.0.0.1
	$user = "root";
	$bdd = "projet"; // le nom de votre base de données
	$passwd = "";

	$co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");	

	if(isset($_POST["liste"])) {

		$liste = $_POST["liste"];

		}
	else	echo "Connexion pas réussi!";

		// même principe logique que affichemembre
		if($liste){

			 $_SESSION['liste'] = $liste ;
			$mail=$_SESSION['Mail']; 

			$result = mysqli_query($co,"SELECT * FROM liste WHERE NomListe='$liste'");

		    if(mysqli_num_rows($result)!=1) {
		       		$requete = "INSERT INTO liste(NomListe) VALUES ('$liste')";
		       		$result = mysqli_query($co,$requete);
		       		$Mail= mysqli_insert_id($co);


		       		$requete1 = "INSERT INTO possede(IdMembre,IdListe) VALUES 
		       		((SELECT IdMembre FROM MEMBRE WHERE Mail = '$mail'), (SELECT IdListe FROM liste WHERE NomListe='$liste'))";
		       		$result1 = mysqli_query($co,$requete1);
		       		$Mail= mysqli_insert_id($co);

		       		echo "Bonjour, Vous avez bien créer la liste : ".$liste;
		     	}
		}
		else echo"Ecriver le nom de la liste merde";
    
   

    mysqli_close($co);
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


