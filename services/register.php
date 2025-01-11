<?php
/*
Sepocatch ICP v5

Register Service
*/

include '../src/DataManager.php';

if (!isset($_POST ["username"])) {
    header("Location: /login.php");
}

$dm = new DataManager();
$username = $_POST ["username"];
$password = $_POST ["password"];

if ($dm->checkAvalibleName($username)) {
    $dm->addUser($username, $password);
    header("Location: /login.php");
} else {
    header("Location: /register.php?error=1");
}