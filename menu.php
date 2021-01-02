<div class="Connexion">

<?php

if(isset($_POST["Disconnect"])){
    $_SESSION["Logged"] = false;
}


function menu_check() {
    if ($_SESSION["Logged"] !== true) {
        echo ('
            
        <form action="Login.php" method="post">
            <input type="submit" name="Login" value="Login">
        </form>

        <form action="SignIn.php" method="post">
            <input type="submit" name="SignIn" value="Sign In">
        </form>
        
        ');

      return false;

    }
    
    else{
        echo ('
            
        <form action="index.php" method="post">
            <input type="submit" name="Disconnect" value="Disconnect">
        </form>
        
        ');

        return true;
    }
}

?>

</div>