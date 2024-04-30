<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
isLogin();
$user = new user();
$id = $user->data()->id;
$group = $user->data()->groups;

$config = new config;
$con = $config->con();
if($group == '4'){
    $sql = "UPDATE `tbl_accounts` SET `groups`='1' WHERE `id` = '$id'";
}else{
    $sql = "UPDATE `tbl_accounts` SET `groups`='4' WHERE `id` = '$id'";
}
$data = $con->prepare($sql);
$data->execute();
header("Location: udashboard.php");

?>