<?php 
/* 
Sepocatch Virtual ICP version 5

Register
*/

$logged_in = false;
session_start();
// 检测登录 //
if(isset($_SESSION['sepocatch_icp_username'])) {
    $logged_in = true;
    header('Location: index.php');
}

$error_hidden = "hidden";
$error = "杂鱼~杂鱼~";
// 结束检测 //

$title = "注册";
include './src/front/header.html';
include './src/front/register.html';
include './src/front/footer.html';