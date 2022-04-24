<?php
require_once "autoload.php";
require_once "session.php";
$Id = $_SERVER["QUERY_STRING"];
global $bdd ;
$object = null;
$object= new Post(selectPost($bdd,$Id));

$CAPTION = "Modifier une Annonce";
require_once "header.phtml";
require_once "post-update.phtml";
require_once "footer.phtml";