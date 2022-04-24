<?php 
require_once "autoload.php";
require_once "session.php";

$identification = $_SERVER["QUERY_STRING"];
global $bdd ;
$object = null;
$object= new User(selectUser($bdd,$identification));
// TODO
// $object is an instance of User retrieved from the database.

$CAPTION = "Update User";
require_once "header.phtml";
require_once "user-update.phtml";
require_once "footer.phtml";
