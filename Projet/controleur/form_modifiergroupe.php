<?php

    session_start();

    $host = "localhost"; // ou 127.0.0.1
    $user = "root";
    $bdd = "projet"; // le nom de votre base de données
    $passwd = "";

    $co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");

    if(isset($_POST["ancienGrp"])) {

        $ancienGrp = $_POST["ancienGrp"];
        $newGrp = $_POST["newGrp"];

        }
    else    echo "Connexion pas réussi!";

    $mail = $_SESSION['Mail'];


        if($ancienGrp){

            $result = mysqli_query($co,"SELECT * FROM groupe WHERE NomGroupe='$ancienGrp'");

            if(mysqli_num_rows($result)==1) {

                    //requete du dessous permet de modifier
                    $requete = "UPDATE Groupe SET NomGroupe='$newGrp'";
                       $result = mysqli_query($co,$requete);
                       $Mail= mysqli_insert_id($co);

                       echo "Bonjour, Vous avez bien modifier le groupe ";


                 }
                 


        }
        else echo"Ecriver votre nom de groupe!";



    mysqli_close($co);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd%22%3E
<html xmlns="http://www.w3.org/1999/xhtml%22%3E

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