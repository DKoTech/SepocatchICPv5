<?php
/*
Sepocatch ICP v5

Login Service
*/

include '../src/DataManager.php';

if (!isset($_POST ["username"])) {
    header("Location: /login.php");
}

$dm = new DataManager();
$username = $_POST ["username"];
$password = $_POST ["password"];

if ($dm->checkUser($username, $password)) {
    session_start();
    $_SESSION ["sepocatch_icp_username"] = $username;
    header("Location: /");
} else {
    header("Location: /login.php?error=1");
}