<?php
session_start();
include "functions.php";

$LoginValid = "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="menu.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>


<?php include('Header.php');?>

  <div class="Contenu">

<?php 
  try{
        if(connection($BDD)){
            if(check()){
                include "menu.php";
            }
            else{
                connection($BDD);
            }
        }
    }

    catch(Exception $e){
        echo "J'ai eu un problème erreur :".$e->getMessage();
    }
?>

  <div class="container">

                <form action="Login.php" method="post">
                <b class='LoginValid'><?php echo $LoginValid ?></b>
                <p><input type="text" placeholder="Username" name="Login_Username"></p>
                <p><input type="password" placeholder="Password" name="Login_Password"></p>
               <p><input type="submit" name='Login_submit' value="Login"></p>
        </form>
            </div>

</div>
   
  

    <div class="Footer">Copyright 2020 - 2030</div>
    
</body>
</html>