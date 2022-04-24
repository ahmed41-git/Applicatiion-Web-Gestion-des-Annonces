<?php
//afficher la liste d'annonces
//$CAPTION = "Liste des Annonces";
require_once "autoload.php";
require_once "session.php";
global $bdd ;
function isOwner($post) {
    if($post->getUserID()===$_SESSION["session"])
       return true;

}

$posts=[];
// TODO
// $posts is an array of Post instances retrieved from the database
$requete=$bdd->query("SELECT * from post");
while($donnee=$requete->fetch())
{   $don=$donnee;
    $don["username"]=selectPostIdUsername($bdd, $donnee["user_id"])["username"];
    $posts[] = new Post($don);
}
if(empty($posts))
{
$CAPTION = "";

require_once "header.phtml";
require_once "nav.phtml";

    ?>
    <h2>Pas D'annonce pour le moment</h2>
    <a href="post-insert.php?<?=$_SESSION["session"];?>" class="btn btn-primary" role="button">Add Posts ??</a>
  
    <?php
require_once "footer.phtml";
}
else {
$CAPTION = "Liste des annonces";
require_once "header.phtml";
require_once "nav.phtml";
require_once "list.phtml";
require_once "footer.phtml";
}