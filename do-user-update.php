<?php 
require_once "autoload.php";
require_once "session.php";

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

if (doUpdate()) {
 header("Location: sign-out.php");
  
}

function doUpdate() {
    
    $utilisateur = new User($_POST);
    // print_r($_POST);
        global $bdd ;
        $cle = $_POST["hidden"];
    if(($veryfy=verifyUsername($bdd,$utilisateur->getUsername()))===0)
    {

        $utilisateur->update($bdd,$cle);
            return true;
       
    }
    $don["username"]=selectPostIdUsername($bdd,$_SESSION["session"])["username"];
    if((($veryfy=verifyUsername($bdd,$utilisateur->getUsername()))===1) && ($utilisateur->getUsername()===$don["username"]))
    {

        $utilisateur->update($bdd,$cle);
            return true;
       
    }

       require_once "error.phtml";
       require_once "user-update.php";
       return false;
}