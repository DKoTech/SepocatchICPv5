<?php
/* 
Sepocatch VICP v5

Confirm to delete Services.
*/

include '../src/DataManager.php';

if (!isset($_GET ["domain"]) || !isset($_GET ["sdomain"])) {
    header("Location: /manage.php?tips=已取消删除。");
}

$domain = $_GET ["domain"];
$sdomain = $_GET ["sdomain"];

if ($domain == $sdomain) {
    $dm = new DataManager();
    $record = $dm->getRecords($domain);
    if ($record ["Creator"] != $sepocatch_icp_username) {
        header("Location: ./manage.php?action=list");
    }
    $dm->removeRecord($domain);
    header("Location: /manage.php?tips=删除成功。");
} else {
    header("Location: /manage.php?tips=已取消删除。");
}