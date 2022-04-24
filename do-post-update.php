<?php
//modifier une annonce
require_once "autoload.php";
require_once "session.php";

$ID = $_POST["hidden"];

if (empty($ID)) {
    header("Location: index.php");
    exit();
}

// TODO
global $bdd;
$_POST["photo"]=  base64_encode(file_get_contents($_FILES["photo"]["tmp_name"]));
$annonce = new Post($_POST);
$annonce->update($bdd,$ID);

header("Location: view.php?$ID");
exit();
