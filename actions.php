<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';


$user = new user();

if($_GET['state'] == '1' && $user->data()->groups == '1'){  // set for signature
  $action = new update($_GET['transactionID']);
  $action->kcej_setStateFS();
  header('Location:udashboard.php');
}elseif($_GET['state'] == '2' && $user->data()->groups == '1'){  // set as for release
  $action = new update($_GET['transactionID']);
  $action->kcej_setStateFR();
  header('Location:udashboardfs.php');
}elseif($_GET['state'] == '3' && $user->data()->groups == '3'){  // set as released
  $action = new update($_GET['transactionID'], $_GET['type']);
  $action->kcej_setStateRL();
  header('Location:rdashboard.php');
}elseif($_GET['state'] == '4' && !empty($user->data()->groups)){  // delete
  $action = new update($_GET['transactionID'], $_GET['type']);
  $action->kcej_setStateDL();
  if($_GET['landing'] == 'udash'){
    header('Location:udashboard.php');
  }elseif($_GET['landing'] == 'udashfs'){
    header('Location:udashboardfs.php');
  }elseif($_GET['landing'] == 'rdash'){
    header('Location:rdashboard.php');
  }else{
    header("HTTP/1.1 403 Forbidden");
    exit();
  }
}else{
  header("HTTP/1.1 403 Forbidden");
  exit();
}
?>