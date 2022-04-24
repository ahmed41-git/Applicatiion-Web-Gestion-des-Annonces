<?php
session_start();

if (isset($_SESSION["last"]) && $_SESSION["last"] > 0 && time() - $_SESSION["last"] < 3600) {
    $_SESSION = array();
    session_destroy();

    header("Location: sign-in.php");
    exit();
}