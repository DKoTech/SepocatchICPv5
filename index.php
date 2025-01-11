<?php 
/* 
Sepocatch Virtual ICP version 5

Index Page.
*/

$logged_in = false;
session_start();
// 检测登录 //
if(isset($_SESSION['sepocatch_icp_username'])) {
    $logged_in = true;
    $sepocatch_icp_username = $_SESSION['sepocatch_icp_username'];
}
// 结束检测 //
$title = "首页";
include './src/front/header.html';
include './src/front/index.html';
include './src/front/footer.html';