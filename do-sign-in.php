<?php
//identifier un utilisatateur lors de la connecxion
require_once "autoload.php";

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}
global $bdd ;
session_start();
session_destroy();
   
if (doSignIn()) {
    session_start();
    $_SESSION["last"] = time();
    
    header("Location: index.php");

}

function doSignIn() {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    // TODO
    if(isset($username ) AND isset($password))
    {
             global $bdd ;
            $var=$bdd->query("SELECT * FROM  user WHERE username='$username' and password='$password' ");
            $donnee=$var->fetch();
            
           if(isset($donnee["id"]))
           {
            session_start();
            $_SESSION["session"]= $donnee["id"];
               return true;
          }
         echo "<div class='container alert alert-warning alert-dismissible w-50'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
   <h6> Nom d'utilisateur ou mot de passe incorrect!!!!</h6>
  </div>";
  require_once "sign-in.php";
           
    return false;
    //return true;
}
}
