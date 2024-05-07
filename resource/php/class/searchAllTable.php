<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';
// require_once 'config.php';

class searchAllTable extends config{

  public $key;

  function __construct($key=null){
    $this->key = $key;
  }

  public function searchTable(){

    $upkey = strtoupper($this->key);
    $con = $this->con();
    $sql = "SELECT * FROM `tbl_transaction` WHERE UPPER(`fullname`) LIKE '%$upkey%' OR UPPER(`transactionid`) LIKE '%$upkey%'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);

    echo "<hr class='mt-5'>";
    echo "<h3 class='text-center mt-3'> <i class='fa-solid fa-table-list'></i> Search Results for '$this->key'</h3>";
    echo "<hr>";
    echo "<h5 class='text-center mt-4'><i class='fa-solid fa-graduation-cap'></i> Regular Transaction </h5>";
    echo "<div class='table-responsive pb-3'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-striped table-hover shadow display' width='100%' style='font-size: 12px'>";
    echo "<thead class='thead-dark'>";
    echo "<th style='width: 150px;'>Transaction ID</th>";
    echo "<th style='width: 250px;'>Full Name</th>";
    echo "<th style='width: 100px;'>Student Number</th>";
    echo "<th style='width: 100px;'>Type</th>";
    echo "<th style='width: 50px;'>Year</th>";
    echo "<th style='width: 250px;'>Course</th>";
    echo "<th style='width: 100px;'>Date Applied</th>";
    echo "<th style='width: 170px;'>Purpose</th>";
    echo "<th style='width: 90px;'>Remarks</th>";
    echo "<th>Assignee</th>";
    echo "<th>Actions</th>";
    echo "</thead>";
    foreach($result as $data){
      $temp_name = utf8_decode($data['fullname']);
      $fullname = strtoupper(str_replace('?', 'Ñ', $temp_name));
      $assignee = findAssignee($data['assignee']);
      echo "<tr style='font-size: 13px'>";
      echo "<td>$data[transactionid]</td>";
      echo "<td>$fullname</td>";
      echo "<td>$data[stdn]</td>";
      echo "<td>$data[status]</td>";
      echo "<td>$data[yeargrad]</td>";
      echo "<td>$data[course]</td>";
      echo "<td>$data[dateapp]</td>";
      echo "<td>$data[reason]</td>";
      echo "<td>$data[remarks]</td>";
      echo "<td>$assignee</td>";
      echo "<td>";
        $user = new user();
        if($user->data()->groups == 1 || $user->data()->groups == 4){
          echo "<a href='info.php?tID=$data[transactionid]&type=reg' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
        }elseif($user->data()->groups == 2){
          echo "<a href='ainfo3.php?tID=$data[transactionid]&type=reg' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
        }elseif($user->data()->groups == 3){
          echo "<a href='info.php?tID=$data[transactionid]&type=reg' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
        //}elseif($user->data()->groups == 4){
        //  echo "<a href='sinfo2.php?tID=$data[transactionid]&type=reg' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
        }else{
          // display nothing
        }
      echo "</td></tr>";
    }
  echo "</table></div>";

    $sql0 = "SELECT * FROM `tbl_spctransaction` WHERE UPPER(`fullname`) LIKE '%$upkey%' OR UPPER(`transactionid`) LIKE '%$upkey%'";
    $data0= $con->prepare($sql0);
    $data0->execute();
    $result0 = $data0->fetchAll(PDO::FETCH_ASSOC);

    echo "<hr>";
    echo "<h5 class='text-center mt-4'><i class='fa-solid fa-graduation-cap'></i> Special Transaction </h5>";
    echo "<div class='table-responsive pb-3'>";
    echo "<table id='scholartable2' class='table table-bordered table-sm table-striped table-hover shadow display' width='100%' style='font-size: 12px'>";
    echo "<thead class='thead-dark'>";
    echo "<th style='width: 150px;'>Transaction ID</th>";
    echo "<th style='width: 250px;'>Full Name</th>";
    echo "<th style='width: 100px;'>Student Number</th>";
    echo "<th style='width: 100px;'>Type</th>";
    echo "<th style='width: 50px;'>Year</th>";
    echo "<th style='width: 250px;'>Course</th>";
    echo "<th style='width: 100px;'>Date Applied</th>";
    echo "<th style='width: 170px;'>Purpose</th>";
    echo "<th style='width: 90px;'>Remarks</th>";
    echo "<th>Assignee</th>";
    echo "<th>Actions</th>";
    echo "</thead>";

    foreach ($result0 as $data0) {
      $temp_name0 = utf8_decode($data0['fullname']);
      $fullname0 = strtoupper(str_replace('?', 'Ñ', $temp_name0));
      $assignee0 = findAssignee($data0['assignee']);
      echo "<tr style='font-size: 13px'>";
      echo "<td>$data0[transactionid]</td>";
      echo "<td>$fullname0</td>";
      echo "<td>$data0[stdn]</td>";
      echo "<td>$data0[status]</td>";
      echo "<td>$data0[yeargrad]</td>";
      echo "<td>$data0[course]</td>";
      echo "<td>$data0[dateapp]</td>";
      echo "<td>$data0[reason]</td>";
      echo "<td>$data0[remarks]</td>";
      echo "<td>$assignee0</td>";
      echo "<td>";
        $user = new user();
        if($user->data()->groups == 1 || $user->data()->groups == 4){
          echo "<a href='info.php?tID=$data0[transactionid]&type=sp' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
        }elseif($user->data()->groups == 2){
          echo "<a href='ainfo3.php?tID=$data0[transactionid]&type=sp' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
        }elseif($user->data()->groups == 3){
          echo "<a href='info.php?tID=$data0[transactionid]&type=sp' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
        //}elseif($user->data()->groups == 4){
        //  echo "<a href='sinfo2.php?tID=$data0[transactionid]&type=sp' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
        }else{
          // display nothing
        }
      echo "</td></tr>";
    }
  echo "</table></div>";
  }
}
?>

