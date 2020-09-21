<?php

	session_start();
	$host = "localhost"; // ou 127.0.0.1
	$user = "root";
	$bdd = "projet"; // le nom de votre base de données
	$passwd = "";

	$co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");	
	// utilisation type, je me connecte à la db j'insére mes valeurs et j'envoi
	if(isset($_POST["grp"])) {

		$grp = $_POST["grp"];
		$mail= $_POST["mail"];

		}
	else	echo "Connexion pas réussi!";


		if($grp && $mail){
		// même principe mais pour membre
			$result = mysqli_query($co,"SELECT * FROM groupe WHERE NomGroupe='$grp'");

		    if(mysqli_num_rows($result)==1) {

		       		$requete1 = "INSERT INTO appartient(IdMembre,IdGroupe,ChefGrp) VALUES 
		       		((SELECT IdMembre FROM MEMBRE WHERE Mail = '$mail'), (SELECT IdGroupe FROM GROUPE WHERE NomGroupe='$grp'),false)";
		       		$result1 = mysqli_query($co,$requete1);
		       		$Mail= mysqli_insert_id($co);

		       		$_SESSION['grp'] = $grp;

		       		echo "Bonjour, Vous avez bien ajouter un membre dans le groupe ";
		     	}
		}
		else echo"Ecriver le nom ou le mail! ";
    
   

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


</html>