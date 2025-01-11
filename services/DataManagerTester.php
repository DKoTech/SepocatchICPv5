<?php
/* 
Sepocatch VICP v5

DataManager Skills Tester
*/
include '../src/DataManager.php';

$dm = new DataManager();
echo $dm->getAllRecordsByCreator('DKoTechnology') [0] ['Creator'];
foreach ($dm->getAllRecordsByCreator('DKoTechnology') as $domain) {
    echo '<li class="list-group-item">' . $domain['Domain'] . ' <a href="manage.php?action=delete&domain=' . $domain['Domain'] . '">删除</a> <a href="manage.php?action=modify&domain=' . $domain['Domain'] . '&id='. $domain['Number'] .'">修改</a></li>'; 
}

$dom = new DOMDocument;
libxml_use_internal_errors(true); // 禁用libxml错误，避免HTML中的不规范标签导致的警告
set_time_limit(30);
try {
    $dom->loadHTMLFile("https://blog.sinzmise.top/index.php");
}
catch (Exception $e) {
    $isTakingLink = "<font style='color: red;'>网页不可达</font>";
}
if ($dom->getElementById("SepocatchICPv5Link")) {
    echo "found";
}
else {
    echo "not found";
}
