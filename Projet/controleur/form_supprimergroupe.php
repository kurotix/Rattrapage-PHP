<?php
	
	session_start();

	$host = "localhost"; // ou 127.0.0.1
	$user = "root";
	$bdd = "projet"; // le nom de votre base de données
	$passwd = "";

	$co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");	

	if(isset($_POST["grp"])) {

		$grp = $_POST["grp"];

		}
	else	echo "Connexion pas réussi!";

	$mail = $_SESSION['Mail'];

		
		if($grp){

			$result = mysqli_query($co,"SELECT * FROM groupe WHERE NomGroupe='$grp'");

		    if(mysqli_num_rows($result)==1) {

		    		$requete1 = "DELETE FROM appartient WHERE IdMembre = (SELECT IdMembre FROM membre  WHERE mail= '$mail') AND IdGroupe = (SELECT IdGroupe FROM groupe WHERE NomGroupe='$grp')";
		       		$result1 = mysqli_query($co,$requete1);
		       		$Mail= mysqli_insert_id($co);
					

					//requete du dessous permet de supprimer 
		    		$requete = "DELETE FROM groupe WHERE NomGroupe='$grp'";
		       		$result = mysqli_query($co,$requete);
		       		$Mail= mysqli_insert_id($co);

		       		echo "Bonjour, Vous avez bien supprimer le groupe ";

		     	}


		}
		else echo"Ecriver votre nom de groupe!";
    
   

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


