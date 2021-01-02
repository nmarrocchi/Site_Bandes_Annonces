<?php
$BDD = new PDO('mysql:host=localhost; dbname=tpfinalphmysql; charset=utf8','root', 'root');

function check() {
    if ($_SESSION["Logged"] !== true) {
        echo "false";
      return false;
    }else{
        echo "True";
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
            
            return true;
        }else{

        }
    }

} 
?>