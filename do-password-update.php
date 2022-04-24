<?php 
require_once "autoload.php";

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

if (doPasswordUpdate()) {
    header("Location: sign-out.php");
  
}

function doPasswordUpdate() {
    
    $utilisateur = new User($_POST);
    $password=$_POST["password"];
     global $bdd ;
   
     if($utilisateur->getPassword()===$utilisateur->getPasswordx())
        {
        $cle = $_POST["hidden"];
        $bdd->query("UPDATE  user SET password=md5('$password') where id=$cle");
             return true;
         }
        echo "<div class='container alert alert-warning alert-dismissible w-50'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
       <h6> Mot de passe non identique!!!!</h6>
      </div>";
      require_once "password-update.php";
      return false;
     
}