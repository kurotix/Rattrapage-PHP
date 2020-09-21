<?php
	
	session_start();

	$host = "localhost"; // ou 127.0.0.1
	$user = "root";
	$bdd = "projet"; // le nom de votre base de données
	$passwd = "";


	$co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");
	
	if(isset($_POST["Mail"]) && isset($_POST["mdp"])) {
		$Mail = $_POST["Mail"];
     	$mdp = $_POST["mdp"];

     	if($Mail && $mdp){
     	
     		$result = mysqli_query($co,"SELECT * FROM membre WHERE Mail='$Mail' && mdp='$mdp' ") or die("erreur de requete");
     		if($trouve = mysqli_num_rows($result)){

     		$_SESSION['Mail'] = $Mail;
			// rends la session de l'user actif
     		header('Location:..\vue\membre.php');
     		}
     		else echo "MdpVotre identifiant ou mot de passe est incorrect";
			// si mdp et ou id incorrect le message du dessu est généré
       	}

       	else echo"Veuillez remplir tous les champs";
		// si rien est rempli
	}
	mysqli_close($co);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="..\modele\lecss.css" /> 


</head>
<body>
		<br><br></br>
		<form method="post" action="..\vue\acceuil.php">
			<input type="submit" name="retour" value="Retour">
		</form>
</body>


