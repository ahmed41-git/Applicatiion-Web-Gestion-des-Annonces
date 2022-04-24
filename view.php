<?php 
require_once "autoload.php";
require_once "session.php";
global $bdd ;
function isOwner($post) {
    if($post->getUserID()===$_SESSION["session"])
    return true;
    
}
$postID = $_SERVER["QUERY_STRING"];
$post = null;
// TODO
// $post is an instance of Post retrieved from the database.
$table=selectPost($bdd,$postID);
$table["username"]=selectPostIdUsername($bdd, $table["user_id"])["username"];
$post = new Post($table);
$CAPTION = "Annonce";
require_once "header.phtml";
require_once "view.phtml";
require_once "footer.phtml";
