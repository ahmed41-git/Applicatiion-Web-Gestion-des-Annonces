<?php
//ajouter un compte (insert)
require_once "autoload.php";

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

session_start();
session_destroy();

if (doSignUp()) {
    session_start();
    $_SESSION["last"] = time();
    header("Location: sign-in.php");
}
 exit();

function doSignUp() {
    
    $user = new User($_POST);
    global $bdd;
    if(($veryfy=verifyUsername($bdd,$user->getUsername()))!=0)
    {
     require_once "error.phtml";
       require_once "sign-up.php";
       return false;
    }
    if($user->getPassword()===$user->getPasswordx())
        {
           
            $user->insert($bdd);
            return true;
        }
        else{
            echo "<div class='container alert alert-warning alert-dismissible w-50'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
           <h6> Mot de passe non identique!!!!</h6>
          </div>";
          require_once "sign-up.php";
          return false;
        }
        require_once "error.phtml";

       require_once "sign-up.php";


            return false;
}
