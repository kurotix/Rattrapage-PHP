<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link rel="stylesheet" type="text/css" href="..\modele\lecss.css" /> 

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
 	<title>Liste de Noel</title>

  	<form method="post" action="..\controleur\form_deconnexion.php">
		<p align = right><input type="submit" name="deconnecter" value="Déconnecter" /></p>
	</form>

	<form method="post" action="..\vue\membre.php">
			<p align = left><input type="submit" name="retour" value="Retour"></p>
	</form>
</head>

<body>
		<p> Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>. </p>
			<br>
		<p> <?php session_start();	echo "Bienvenue à vous ".$_SESSION['Mail']; $mail=$_SESSION['Mail']; ?></p>
		
		<ul>
	 		<li><a class="active" href="..\vue\cadeau.php">Ajouter Cadeau</a></li>

		</ul>
	
	
		<?php 

			    $host = "localhost"; // ou 127.0.0.1
				$user = "root";
				$bdd = "projet"; // le nom de votre base de données
				$passwd = "";
				$mailperso = $_POST['mailperso'];
				
				$co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");	

                $result=mysqli_query($co,"SELECT NomListe FROM liste natural join possede WHERE IdMembre = (SELECT IdMembre FROM membre  WHERE Mail= '$mailperso')  ") or die("erreur de requete"); 


                     
                 echo '<table width="15%"><br><br> 
                <tr><th>Liste :</th></tr>';  

                while($data=mysqli_fetch_assoc($result)){ 
                           echo '<tr>
                        <td>
                            <form method="post" action="affichercadeau.php">
                             <input type="hidden" name ="NomListe" value="'.$data['NomListe'].'">
                            <input type="submit" value="'.$data['NomListe'].'">
                            </form>
                        </td>
                    </tr>';
                }

         ?>


</body>