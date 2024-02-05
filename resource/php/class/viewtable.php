<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';
require_once 'config.php';

class viewtable extends config{


public function viewFirstTable(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_std` WHERE `status`='PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Discounts for Review </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
  echo "<th>Fullname</th>";
  echo "<th class='d-none d-sm-table-cell'>Application Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Email Address</th>";
  echo "<th class='d-none d-sm-table-cell'>Status</th>";
  echo "<th style='font-size: 85%;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[stdnumber]</td>";
  echo "<td style='font-size: 85%;'>$data[fullname]</td>";
  echo "<td class='d-none d-sm-table-cell' style='font-size: 85%;'>".$data['application_type']."</td>";
  echo "<td class='d-none d-sm-table-cell'>$data[email]</td>";
  echo "<td class='d-none d-sm-table-cell'>$data[status]</td>";

  echo "<td>
            <a href='editES.php?tn=' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Approve Discounts</a>
            <a href='admesreject.php?tn=' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Reject Discount</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTable(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_std` WHERE `status`='APPROVE'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Discounts for Review </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
  echo "<th>Fullname</th>";
  echo "<th class='d-none d-sm-table-cell'>Application Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Email Address</th>";
  echo "<th class='d-none d-sm-table-cell'>Status</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[stdnumber]</td>";
  echo "<td style='font-size: 85%;'>$data[fullname]</td>";
  echo "<td class='d-none d-sm-table-cell' style='font-size: 85%;'>".$data['application_type']."</td>";
  echo "<td class='d-none d-sm-table-cell'>$data[email]</td>";
  echo "<td class='d-none d-sm-table-cell'>$data[status]</td>";


  echo "</tr>";
  }
  echo "</table>";

}

  public function tableWalkIn()
  {

    $con = $this->con();
    $sql = "SELECT * FROM `tbl_transaction` WHERE `remarks` = 'PENDING'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3 class='text-center p-3'> Normal Transaction List </h3>";
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction Number</th>";
    echo "<th style='width: 250px;'>Name</th>";
    echo "<th>Course</th>";
    echo "<th>Request Date</th>";
    echo "<th>Email</th>";
    echo "<th>Messenger</th>";
    echo "<th style='width: 175px;'>Actions</th>";
    echo "</thead>";

    foreach ($result as $data) {
    echo "<tr style='font-size: 13px'>";
    echo "<td>$data[transactionid]</td>";
    echo "<td>$data[fullname]</td>";
    echo "<td>$data[course]</td>";
    echo "<td>$data[dateapp]</td>";
    echo "<td>$data[emailaddress]</td>";
    if(empty($data['facebook'])){
      echo "<td>No Data</td>";
    }else{
      echo "<td>$data[facebook]</td>";
    }
    echo "<td><a href='https://mail.google.com/mail/?view=cm&fs=1&to=$data[emailaddress]&su= $data[fullname] - CEU Document Request -  $data[transactionid]&body=Goodmorning!%0D%0A%0D%0AWe have received and acknowledged your request!%0D%0A%0D%0ATotal Break down of your transaction is listed below:%0D%0A %0D%0A $data[summary] %0D%0ATotal Price: PHP$data[price].00 %0D%0A%0D%0APayments can be made through this link.%0D%0A https://ptipages.paynamics.net/ceu/default.aspx %0D%0A%0D%0A *Please send us the proof of payment to this email address for us to proceed with your documents. %0D%0A %0D%0A Release date is 15 working days after submission of proof of payment for TOR %0D%0A and 5 working days after submission of proof of payment for certificates ( please send it to this email thread for faster transaction) %0D%0A %0D%0A Thank you and Stay safe!' target='_blank' class='btn btn-sm  btn-google m-1' data-toggle='tooltip' data-placement='top' title='Open Gmail'><i class='fa-brands fa-google'></i></a>";
     if(empty($data['facebook'])){
            echo "<a href='#' class='btn btn-sm  btn-secondary m-1 disabled' data-toggle='tooltip' data-placement='top' title='FB'><i class='fa-brands fa-facebook' disabled></i></a>";
    }else{
      echo "<a href='https://www.messenger.com/t/$data[facebook]' target='__blank' class='btn btn-sm  btn-primary m-1' data-toggle='tooltip' data-placement='top' title='FB'><i class='fa-brands fa-facebook'></i></a>";
          }                    
    echo       "<a href='appInfo.php' class='btn btn-sm  btn-success m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>        
                <a href='appInfo.php' class='btn btn-sm  btn-danger m-1' data-toggle='tooltip' data-placement='top' title='Remove Request'><i class='fa-solid fa-trash'></i></a>
                    </td>";
    }
  }

  // <a href='appInfo.php' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='Assign Request to an Encoder'><i class='fa-solid fa-users'></i></a>

  public function kcej_rTrans()
  {
    $user = new user();
    $assignee = $user->data()->id;
    $con = $this->con();
    // echo $assignee;
    $sql = "SELECT * from `tbl_transaction` WHERE `assignee` = '$assignee' AND `remarks` = 'PENDING'";
    $data= $con->prepare($sql);

    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3 class='text-center p-3'> Applications List - Pending </h3>";
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction Number</th>";
    echo "<th style='width: 250px;'>Name</th>";
    echo "<th>Course</th>";
    echo "<th>Request Date</th>";
    echo "<th>Status</th>";
    echo "<th style='width: 175px;'>Actions</th>";
    echo "</thead>";

    foreach ($result as $data) {
    echo "<tr style='font-size: 13px'>";
    echo "<td>$data[transactionid]</td>";
    echo "<td>$data[fullname]</td>";
    echo "<td>$data[course]</td>";
    echo "<td>$data[dateapp]</td>";
    echo "<td>$data[remarks]</td>";
    echo "<td>Pending</td>";
    echo "<td><a href='appInfo.php' class='btn btn-sm  btn-google m-1' data-toggle='tooltip' data-placement='top' title='Open Gmail'><i class='fa-brands fa-google'></i></a>
                        <a href='appInfo.php' class='btn btn-sm  btn-primary m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>
                        
                        <a href='appInfo.php' class='btn btn-sm  btn-danger m-1' data-toggle='tooltip' data-placement='top' title='Remove Request'><i class='fa-solid fa-trash'></i></a>
                    </td>";
    }
  }

  public function kcej_rForsig()
  {
    $user = new user();
    $assignee = $user->data()->id;
    $con = $this->con();
    // echo $assignee;
    $sql = "SELECT * from `tbl_transaction` WHERE `assignee` = '$assignee' AND `remarks` = 'FOR SIGNATURE'";
    $data= $con->prepare($sql);

    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3 class='text-center p-3'> Applications List - For Signature </h3>";
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction Number</th>";
    echo "<th style='width: 250px;'>Name</th>";
    echo "<th>Course</th>";
    echo "<th>Request Date</th>";
    echo "<th>Status</th>";
    echo "<th style='width: 175px;'>Actions</th>";
    echo "</thead>";

    foreach ($result as $data) {
    echo "<tr style='font-size: 13px'>";
    echo "<td>$data[transactionid]</td>";
    echo "<td>$data[fullname]</td>";
    echo "<td>$data[course]</td>";
    echo "<td>$data[dateapp]</td>";
    echo "<td>$data[remarks]</td>";
    echo "<td>Pending</td>";
    echo "<td><a href='appInfo.php' class='btn btn-sm  btn-google m-1' data-toggle='tooltip' data-placement='top' title='Open Gmail'><i class='fa-brands fa-google'></i></a>
                        <a href='appInfo.php' class='btn btn-sm  btn-primary m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>
                        
                        <a href='appInfo.php' class='btn btn-sm  btn-danger m-1' data-toggle='tooltip' data-placement='top' title='Remove Request'><i class='fa-solid fa-trash'></i></a>
                    </td>";
    }
  }

}
