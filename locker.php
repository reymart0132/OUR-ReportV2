<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';

$locker = new locker();
$locker->lockForm();
$url = $_GET['landing'].".php";
header('Location:'.$url);
// header("location:javascript://history.go(-1)");

?>