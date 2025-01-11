<?php
/* 
Sepocatch ICP v5

Logout
*/

session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();