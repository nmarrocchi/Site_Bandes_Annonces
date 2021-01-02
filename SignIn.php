<?php
session_start();
include "functions.php";

$ValueValid = "";
try{
    if (isset($_POST["submit"])) {
        // Inscription si les champs ne sont pas vides et si le nom d'utilisateur n'est pas utilisé

        if(!empty($_POST['Username']) AND !empty($_POST['Password'])){

            $exist = $BDD->query("SELECT COUNT(*) FROM User WHERE Username ='".$_POST['Username']."'");
            $exist = $exist->fetch();

            if ($exist["COUNT(*)"] > 0) {
                $ValueValid = "Ce nom d'utilisateur est déja utilisé";
            } 
            else {
                $insert = $BDD->query("INSERT INTO User(Username, Password) VALUES('".$_POST['Username']."','".$_POST['Password']."')");
                
                if($insert->rowCount()>=1){
                    header("Location: index.php");
                }
                else {
                    echo "Une erreur est survenue";
                }
            }
        }
        
        else {
                $ValueValid = 'Veuillez compléter tout les champs...';
            }

    }
}
catch(Exception $e){
    echo "J'ai eu un problème erreur :".$e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="menu.css" type="text/css">
    <link rel="stylesheet" href="form.css" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>


<?php include('Header.php');?>

  <div class="Contenu">

  <div class="container">

                <form action="" method="post">
                <p><?php echo $ValueValid ?></p>
                <p><input type="text" placeholder="Username" name="Username"></p>
                <p><input type="password" placeholder="Password" name="Password"></p>
               <p><input type="submit" name='submit' value="Sign In"></p>
        </form>
            </div>

</div>
   
  

    <div class="Footer">Copyright 2020 - 2030</div>
    
</body>
</html>



<?php
/*
$ValueValid='';
$bdd = new PDO('mysql:host=127.0.0.1; dbname=tpfinalphMySql; charset=utf8','root', 'root');

if (isset($_POST['submit'])) {
    if(!empty($_POST['Username']) AND !empty($_POST['Password'])){
        $ValueValid = '';
        $Username = htmlspecialchars($_POST['Username']);
        $Password = htmlspecialchars($_POST['Password']); 

        $UserCheck = $bdd->prepare("SELECT `Username` FROM `user` WHERE `Username` = '".$Username."'");
        $UserCheck->execute();
        $Count = $UserCheck->rowCount();
        $UserCheck->closeCursor();

        if ($Count != 0 ) {
            $ValueValid = 'Le pseudo est déja utilisé';
        }
        else{
           $UserBDD = $bdd->prepare("SELECT * FROM user WHERE Username = '".$Username."' AND Password = '".$Password."'");
            $UserBDD->execute();

            $UserAdd = $bdd->prepare("INSERT INTO user (Username, Password) VALUES ('".$Username."', '".$Password."')");
            $UserAdd->execute();
            $UserAdd->closeCursor(); // Termine le traitement de la requète
            $ValueValid = 'Compte créé , vous pouvez maintenant vous connecter'; 
        }

        


            
    }
    else{
        $ValueValid = 'Veuillez compléter tout les champs...';
    }

  }
  */
  ?>