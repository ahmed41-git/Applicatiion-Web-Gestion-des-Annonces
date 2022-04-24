<?php 
require_once "autoload.php";
require_once "session.php";

$identification = $_SERVER["QUERY_STRING"];

$CAPTION = "Update";
require_once "header.phtml";
require_once "password-update.phtml";
require_once "footer.phtml";
