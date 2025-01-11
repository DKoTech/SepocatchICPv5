<?php
/*
Sepocatch ICP v5

Join Service
*/

include '../src/DataManager.php';

if (!isset($_POST['name'])) {
    header("Location: ../index.php");
}

$name = $_POST['name'];
$domain = $_POST['domain'];
/* 
                        <div class="mb-3">
                            <label for="number" class="form-label">名称</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="请输入名称">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">域名</label>
                            <input type="text" class="form-control" id="domain" name="domain" placeholder="请输入域名">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">介绍</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="请输入介绍">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">创建者</label>
                            <input type="text" class="form-control" id="creator" name="creator" placeholder="请输入创建者">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">号码</label>
                            <input type="text" class="form-control" id="number" name="number" placeholder="请输入号码">
                        </div>
*/
$description = $_POST['description'];
$creator = $_POST['creator'];
$number = $_POST['number'];
$domain = str_replace("http://", "", $domain);
$domain = str_replace("https://", "", $domain);

session_start();
$username = $_SESSION ["sepocatch_icp_username"];

$dm = new DataManager();
$dm->addRecord($name, $username, $domain, $description, $number);

header("Location: ../join.php?page=3&domain=". $domain ."&number=". $number);