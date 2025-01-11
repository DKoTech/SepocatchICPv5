<?php
/* 
Sepocatch ICP v5

Show result.
*/

// 检测数据
/* 
setcookie("SPCTHICP-Name", $data["Name"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Domain", $data["Domain"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Description", $data["Description"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Creator", $data["Creator"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-CreateTime", $data["CreateTime"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Status", $data["Status"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-IsTakingLink", $data["IsTakingLink"], time() + 3600 * 24 * 30, "/");
setcookie("SPCTHICP-Number", $data["Number"], time() + 3600 * 24 * 30, "/");
*/
$name = $_COOKIE["SPCTHICP-Name"];
$domain = $_COOKIE["SPCTHICP-Domain"];
$description = $_COOKIE["SPCTHICP-Description"];
$creator = $_COOKIE["SPCTHICP-Creator"];
$createTime = $_COOKIE["SPCTHICP-CreateTime"];
$status = $_COOKIE["SPCTHICP-Status"];
$isTakingLink = "";
$number = $_COOKIE["SPCTHICP-Number"];

// 检测是否为空
if ($name == "" || $domain == "" || $description == "" || $creator == "" || $createTime == "" || $status == "" || $number == "") {
    header("Location: /index.php?domain_not_found=1");
}

// 初始化cURL
$ch = curl_init();

// 设置cURL选项
curl_setopt($ch, CURLOPT_URL, "https://". $domain ."");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// 执行cURL请求
$content = curl_exec($ch);
if(curl_errno($ch)) {
    $isTakingLink = "<font style='color: red;'>网页不可达</font>";
}

// 创建一个新的DOMDocument实例
$dom = new DOMDocument;

// 加载网页内容
libxml_use_internal_errors(true); // 禁用libxml错误，避免HTML中的不规范标签导致的警告
set_time_limit(30);
try {
    $dom->loadHTMLFile("https://". $domain ."/");
}
catch (Exception $e) {
    $isTakingLink = "<font style='color: red;'>网页不可达</font>";
}

// 查找所有的<a>标签
$links = $dom->getElementById("SepocatchICPv5Link");


// 检查是否找到了<a>标签
if ($links) {
    $isTakingLink = "已携带链接";
}
else {
    $isTakingLink = "<font style='color: red;'>未携带链接</font>";
}

curl_close($ch);
$title = "搜索结果";
session_start();
// 检测登录 //
if(isset($_SESSION['sepocatch_icp_username'])) {
    $logged_in = true;
    $sepocatch_icp_username = $_SESSION['sepocatch_icp_username'];
}
// 结束检测 //

include './src/front/header.html';
include './src/front/result.html';
include './src/front/footer.html';