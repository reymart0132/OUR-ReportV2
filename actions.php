<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';
$action = new update($_GET['transactionID']);

if($_GET['state'] == 1){
  $action->kcej_setStateFS();
  header('Location:udashboard.php');
}else{
  header("HTTP/1.1 403 Forbidden");
  exit();
}



?>