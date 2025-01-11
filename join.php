<?php 
/* 
Sepocatch Virtual ICP version 5

Join
*/
include './src/DataManager.php';

$logged_in = true;
session_start();
// 检测登录 //
if(!isset($_SESSION['sepocatch_icp_username'])) {
    if (!isset($_GET["testing"])) {
        header("Location: /login.php?error=2");
    }
}
$sepocatch_icp_username = $_SESSION['sepocatch_icp_username'];
// 结束检测 //

$page = "0";
if (!isset($_GET['page'])) {
    $page = "0";
} else {
    $page = $_GET['page'];
}

$number = "";
if (isset($_GET['number'])) {
    $number = $_GET['number'];
}
$title = "加入";
include './src/front/header.html';

if ($page == "0") {
    include './src/front/join.html'; // tips
}
else if ($page == "1") {
    include "./src/front/join_step2.html"; // select number
}
else if ($page == "2") {
    include "./src/front/join_step3.html"; // register informations
}
else if ($page == "3") {
    include "./src/front/join_step4.html"; // ending (add link)
}
include './src/front/footer.html';