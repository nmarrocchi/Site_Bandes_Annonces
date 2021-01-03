<?php
$BDD = new PDO('mysql:host=localhost; dbname=tpfinalphmysql; charset=utf8','root', 'root');

function check() {
    if ($_SESSION["Logged"] !== true) {
      return false;
    }else{
        return true;
    }
}

function connection($BDD){

    if(isset($_POST['Username'])){
       
        $Result = $BDD->query("SELECT * FROM `user` WHERE `Username`='".$_POST['Username']."' AND `Password` = '".$_POST['Password']."'");
        if($Result->rowCount()>0){
            $tab = $Result->fetch();
            $_SESSION["Logged"] = true;
            $_SESSION["ID_User"] = $tab['id'];
            header("Location: index.php");
            
            return true;
        }else{

        }
    }

} 


if(isset($_POST["Disconnect"])){
    $_SESSION["Logged"] = false;
}

?>

