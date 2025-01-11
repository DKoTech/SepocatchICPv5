<?php
/* 
Sepocatch ICP v5

Search service
*/

include '../src/DataManager.php';

$dm = new DataManager();

$data = $dm->getRecords($_GET["keyword"]) [0];

if ($data == null) {
    header("Location: /search.php?error=1");
}

// 设置对应信息
        /* 
        保存以下数据：
        Name: 名称
        Domain: 域名
        Description: 介绍
        Creator: 创建者
        CreateTime: 创建时间
        Status: 当前状态
        IsTakingLink: 是否带有备案链接
        Number: 号码
        */

// 这里写的一坨米田共，以后再改
setcookie("SPCTHICP-Name", $data["Name"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Domain", $data["Domain"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Description", $data["Description"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Creator", $data["Creator"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-CreateTime", $data["CreateTime"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Status", $data["Status"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-IsTakingLink", $data["IsTakingLink"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Number", $data["Number"], time() + 3600 * 24 * 30, "/");

header("Location: /search.php");