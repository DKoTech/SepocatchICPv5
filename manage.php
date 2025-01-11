<?php 
/* 
Sepocatch Virtual ICP version 5

Manage page.
*/

include './src/DataManager.php';

$dm = new DataManager();
$dm->setDataPath("./services/data/data.json");
$logged_in = false;
session_start();
// 检测登录 //
if(isset($_SESSION['sepocatch_icp_username'])) {
    $logged_in = true;
    $sepocatch_icp_username = $_SESSION['sepocatch_icp_username'];
}
else {
    header("Location: ./login.php");
    exit();
}
// 结束检测 //

// 查看页面 //
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $avaliable_actions = ["index", "list", "modify", "add", "delete", "delete-confirm", "systemctl"];
    if (!in_array($action, $avaliable_actions)) {
        $action = "index";
    }
}
else {
    $action = "index";
}

if ($action == "modify") {
    if (!isset($_GET["id"])) {
        header("Location: ./manage.php?action=list");
        exit();
    }
    $record = $dm->getRecords($_GET["id"]) [0];
    if ($record ["Creator"] != $sepocatch_icp_username && $sepocatch_icp_username != "DKoTechnology") {
        header("Location: ./manage.php?action=list");
    }
    $data = $dm->getRecords($_GET["id"]);
    $name = $data[0]["Name"];
    $domain = $data[0]["Domain"];
    $description = $data[0]["Description"];
    $number = $_GET["id"];
}

if ($action == "delete") {
    if (!isset($_GET["domain"])) {
        header("Location: ./manage.php?action=list");
    }
    $domain = $_GET["domain"];
    $record = $dm->getRecords($_GET["domain"]) [0];
    if ($record ["Creator"] != $sepocatch_icp_username && $sepocatch_icp_username != "DKoTechnology") {
        header("Location: ./manage.php?action=list");
    }
}

if ($action == "delete-confirm") {
    if (!isset($_GET["domain"])) {
        header("Location: ./manage.php?action=list");
    }
    if ($record ["Creator"] != $sepocatch_icp_username && $sepocatch_icp_username != "DKoTechnology") {
        header("Location: ./manage.php?action=list");
    }
    $domain = $_GET["domain"];
    $dm->removeRecord($domain);
    header("Location: ./manage.php?action=list&tips=1");
}

$tips_hidden = "hidden";
if (isset($_GET["tips"])) {
    $tips = $_GET["tips"];
    $tips_hidden = "";
}

// 结束检测 //
$title = "管理后台";
include './src/front/header.html';
include './src/front/manage/'. $action .'.html';
include './src/front/footer.html';

