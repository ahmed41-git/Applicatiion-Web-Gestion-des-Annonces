<?php
//ajouter une nouvelle annonce
require_once "autoload.php";
require_once "session.php";

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

$utilisateur=selectPostId($bdd, $_SESSION["session"]);
$_POST["user_id"]=$utilisateur["id"];
$_POST["photo"]=  file_get_contents($_FILES["photo"]["tmp_name"]);
$poster = new Post($_POST);
global $bdd ;
$poster->insert($bdd);
 header("Location: list.php");
exit();
   