<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';

$action = new update($_GET['transactionID']);

if($_GET['state'] == '1'){
  $action->kcej_setStateFS();
  header('Location:udashboard.php');
}elseif($_GET['state'] == '2'){
  $action->kcej_setStateFR();
  header('Location:udashboardfs.php');
}else{
  header("HTTP/1.1 403 Forbidden");
  exit();
}
?>