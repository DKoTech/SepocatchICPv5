<?php 
/* 
Sepocatch Virtual ICP version 5

Login
*/

$logged_in = false;
session_start();
// 检测登录 //
if(isset($_SESSION['sepocatch_icp_username'])) {
    $logged_in = true;
    header('Location: index.php');
}
// 结束检测 //

$error_hidden = "hidden";
$error = "杂鱼~杂鱼~ 没有 error 哦~";
// 检测登录错误 //
if(isset($_GET['error'])) {
    if($_GET['error'] == '1') {
        $error_hidden = "";
        $error = "用户名或密码错误";
    }
    elseif($_GET['error'] == '2') {
        $error_hidden = "";
        $error = "请先登录再注册网站";
    }
}
// 结束检测 //

$title = "登录";
include './src/front/header.html';
include './src/front/login.html';
include './src/front/footer.html';