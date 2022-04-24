<?php

spl_autoload_register(
    function ($class) {
        require_once "classes/$class.class.php";
    }
);
try {
    $bdd = new PDO("mysql:dbname=pws;host=localhost", "root", "");
} catch (PDOException $e) {
    echo "Erreur : ".$e->getMessage();
    exit();
}

function selectUser($dbh,$id)
{
  $var=$dbh->query("SELECT * FROM  user WHERE id='$id'");
   return $var->fetch();
    
}
function selectUserId($dbh,$username1,$password1)
{
   return $var=$dbh->query("SELECT id FROM  user WHERE username='$username1' and password='$password1'");
    
}
function selectPost($dbh,$id)
{
   $var=$dbh->query("SELECT * FROM  post WHERE id='$id'");
   return $var->fetch();
    
}
function selectPostId($dbh,$id)
{
       $var=$dbh->query("SELECT * FROM  user WHERE id='$id'");
   return $var->fetch();
    
}
function selectPostIdUsername($dbh,$id)
{
       $var=$dbh->query("SELECT username FROM  user WHERE id='$id'");
   return $var->fetch();
    
}
function verifyUsername($dbh,$username1)
{
    $var=$dbh->query("SELECT username FROM  user WHERE username='$username1'");
    return $var->rowCount();
}