<?php
/* 
SEPOCATCH ICP VERSION FIVE
Team: DKoTechnologySTUDIOS
APPROVED AT 2025-1-11 19HO
*/
include '../src/DataManager.php';

$dm = new DataManager();
$dm->setDataPath("./data/data.json");

// 获得所有记录
$records = $dm->getAllRecords();
// 随机一个记录
$record = $records[array_rand($records)];
// 获得 website 的值
$website = $record['Domain'];

echo '{"website": "https://' . $website . '"}';