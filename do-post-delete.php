<?php
//supprimer une anoonce et ses commentaires
require_once "autoload.php";
require_once "session.php";

$ID = $_SERVER["QUERY_STRING"];

if (empty($ID)) {
    header("Location: index.php");
    exit();
}

// TODO
global $bdd;
$posttt=selectPost($bdd,$ID);
$annonce = new Post($posttt);
$annonce->delete($bdd,$ID);

header("Location: list.php");
exit();
