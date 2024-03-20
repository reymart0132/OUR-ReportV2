<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';


$user = new user();
if($_GET['type'] == 'sp'){
  $emailAddress = getEmail2($_GET['transactionID']);
}else{
  $emailAddress = getEmail($_GET['transactionID']);
}
$assignName = kcej_getTransactionAssignName($_GET['transactionID'], $_GET['type']);
$clientName = kcej_getTransactionClientName($_GET['transactionID'], $_GET['type']);
$assignEmail = kcej_getAssigneeEmail($assignName);

if($_GET['state'] == '1' && $user->data()->groups == '1'){  // set for signature
  $action = new update($_GET['transactionID'], $_GET['type']);
  $action->kcej_setStateFS();
  if($_GET['landing'] == 'udash'){
    header('Location:udashboard.php');
  }elseif($_GET['landing'] == 'rdash'){
    header('Location:rdashboard.php');
  }elseif($_GET['landing'] == 'sdash'){
    header('Location:sdashboard.php');
  }elseif($_GET['landing'] == 'adash-onlineapp'){
    header('Location:adash-onlineapp.php');
  }else{
    header("HTTP/1.1 403 Forbidden");
    exit();
  }
}elseif($_GET['state'] == '2' && $user->data()->groups == '1'){  // set as for release
  $action = new update($_GET['transactionID'], $_GET['type']);
  $action->kcej_setStateFR();

  include_once "vendor/release.php";

  if($_GET['landing'] == 'udashfs'){
    header('Location:udashboardfs.php');
  }elseif($_GET['landing'] == 'sdashfs'){
    header('Location:sdashboard.php');
  }elseif($_GET['landing'] == 'sdashfs'){
    header('Location:sdashboardfs.php');  
  }elseif($_GET['landing'] == 'adash-onlineapp'){
    header('Location:adash-onlineapp.php');
  }else{
    header("HTTP/1.1 403 Forbidden");
    exit();
  }
}elseif($_GET['state'] == '3' && ($user->data()->groups == '3' || $user->data()->groups == '2')){  // set as released
  $action = new update($_GET['transactionID'], $_GET['type'], '' ,$user->data()->id);
  $action->kcej_setStateRL();
  header('Location:rdashboard.php');
}elseif($_GET['state'] == '4' && !empty($user->data()->groups)){  // remove transaction
  $action = new update($_GET['transactionID'], $_GET['type'],$_GET['info']);
  $action->kcej_setStateDL();
  $open = true;
  include_once "vendor/sendmailR.php"; //email

  if ($_GET['landing'] == 'udash') {
    header('Location:udashboard.php');
  } elseif ($_GET['landing'] == 'udashfs') {
    header('Location:udashboardfs.php');
  } elseif ($_GET['landing'] == 'rdash') {
    header('Location:rdashboard.php');
  } elseif ($_GET['landing'] == 'sdash') {
    header('Location:sdashboard.php');
  } elseif ($_GET['landing'] == 'sdashfs') {
    header('Location:sdashboardfs.php');
  } elseif ($_GET['landing'] == 'adash-onlineapp') {
    header('Location:adash-onlineapp.php');
  } elseif ($_GET['landing'] == 'adash-asgn1') {
    header('Location:adash-asgn1.php');
  } elseif ($_GET['landing'] == 'adash-asgn2') {
    header('Location:adash-asgn2.php');
  }else {
    header("HTTP/1.1 403 Forbidden");
    exit();
  }
}elseif($_GET['state'] == '5' && $user->data()->groups == '2') {
  $action = new update($_GET['transactionID'], $_GET['type']);
  $action->set_forAssign();

  if($_GET['landing'] == 'udash'){
    header('Location:udashboard.php');
  }elseif($_GET['landing'] == 'udashfs'){
    header('Location:udashboardfs.php');
  }elseif($_GET['landing'] == 'rdash'){
    header('Location:rdashboard.php');
  }elseif($_GET['landing'] == 'sdash'){
    header('Location:sdashboard.php');
  }elseif($_GET['landing'] == 'sdashfs'){
    header('Location:sdashboardfs.php');  
  }elseif($_GET['landing'] == 'adash-onlineapp'){
    header('Location:adash-onlineapp.php');
  }else{
    header("HTTP/1.1 403 Forbidden");
    exit();
  }
}elseif ($_GET['state'] == '6' && $user->data()->groups == '2') {
  if($_GET['type']== 'sp'){
    $action = new update($_GET['transactionID'], $_GET['type'],"", getnextAssigneeChart2Q());
    $action->assignTo();
  }else{
    $action = new update($_GET['transactionID'], $_GET['type'],"", getnextAssigneeChartQ());
    $action->assignTo();
  }
  
  if($_GET['landing'] == 'udash'){
    header('Location:udashboard.php');
  }elseif($_GET['landing'] == 'udashfs'){
    header('Location:udashboardfs.php');
  }elseif($_GET['landing'] == 'rdash'){
    header('Location:rdashboard.php');
  }elseif($_GET['landing'] == 'sdash'){
    header('Location:sdashboard.php');
  }elseif($_GET['landing'] == 'sdashfs'){
    header('Location:sdashboardfs.php');  
  }elseif($_GET['landing'] == 'adash-onlineapp'){
    header('Location:adash-onlineapp.php');
  }elseif($_GET['landing'] == 'adash-asgn1'){
    header('Location:adash-asgn1.php');
  }elseif($_GET['landing'] == 'adash-asgn2'){
    header('Location:adash-asgn2.php');
  }else{
    header("HTTP/1.1 403 Forbidden");
    exit();
  }
}elseif($_GET['state'] == '7' && $user->data()->groups == '4'){
  $action = new update($_GET['transactionID'],'spc');
  $action->setForPayment();
  header('Location:sdashboard.php');
}elseif($_GET['state'] == '8' && $user->data()->groups == '4'){
  $action = new update($_GET['transactionID'],'spc');
  $action->setForSignature();
  header('Location:sdashboardpayment.php');
} elseif ($_GET['state'] == '9' && $user->data()->groups == '4') {
  $action = new update($_GET['transactionID'], 'spc');
  $action->setForRelease();
  $open = true;
  include_once "vendor/release.php";; //email
  header('Location:sdashboardsignature.php');
}else{
  header("HTTP/1.1 403 Forbidden");
  exit();
}
?>