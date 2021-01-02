<?php
    session_start();
    include "fonction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="menu.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>

<?php

if (!isset($_GET['OrderBy']))
    $_GET['OrderBy']  = "nom";


try{

$BDD = new PDO('mysql:host=localhost; dbname=tpfinalphMySql; charset=utf8','root', 'root');

$Result = $BDD->query("SELECT * FROM films ORDER BY ".$_GET['OrderBy']." ASC");



}catch(Exception $e){

echo "J'ai eu un problème erreur :".$e->getMessage();
}


include('Header.php');


    try{

$BDD = new PDO('mysql:host=127.0.0.3; dbname=tpfinalphMySql; charset=utf8','root', 'root');

$MovieResult = $BDD->query("SELECT * FROM films WHERE id = ".$_GET['movie']."");
$Data = $MovieResult->fetch();


}catch(Exception $e){

echo "J'ai eu un problème erreur :".$e->getMessage();
}

?>

    <div class="Contenu">
        <div class="Movie">
            <img src="img/movies/<?php echo $Data['nom']?>.jpg">
            <div class="Synopsis">
                <p><?php echo $Data['Synopsis']?></p>
            </div>
        </div>   

        <div class="lecteur_ytb">
            <iframe width="560" height="315" src="<?php echo $Data['url-youtube']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>
        
    </div>
   
  

    <div class="Footer">Copyright 2020 - 2030</div>
    
</body>
</html>