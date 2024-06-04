<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$configsdocsraw = new config;
$consdocsraw = $configsdocsraw->con();
isLogin();
if(empty($_GET['monthPicker'])){
    $datesdocsraw2 = get_current_date2();
    $titledate = "- Current Month";
}else{    
    $ndate = $_GET['monthPicker'];
    // Ensure the date format is compatible with strtotime
    $formatted_ndate = date("m/Y", strtotime($ndate));
    $titledate = " - ".date("F Y", strtotime($ndate));
    $datesdocsraw2 = $formatted_ndate;
}

if(!empty($_GET['alltime'])){
    $sql = "SELECT *, datediff(`signeddate`,`paymentdate`) AS `ctime` FROM tbl_transaction ORDER BY `dateapp` ASC";
    $titledate = "- All Time";
}else{
    $sql = "SELECT *, datediff(`signeddate`,`paymentdate`) AS `ctime`
    FROM tbl_transaction WHERE YEAR(`dateapp`) = SUBSTRING_INDEX('$datesdocsraw2', '/', -1) AND MONTH(`dateapp`) = SUBSTRING_INDEX('$datesdocsraw2', '/', 1) ORDER BY `dateapp` ASC";

    // $sql2 = "SELECT AVG(datediff(`signeddate`,`paymentdate`)) AS `cycletime` FROM `tbl_spctransaction` WHERE `remarks` IN ('RELEASED', 'FOR RELEASE') 
    // AND YEAR(`dateapp`) = SUBSTRING_INDEX('$datesdocsraw2', '/', -1) 
    // AND MONTH(`dateapp`) = SUBSTRING_INDEX('$datesdocsraw2', '/', 1)";
}

$dataStatement = $consdocsraw->prepare($sql);
$dataStatement->execute();
$result = $dataStatement->fetchAll(PDO::FETCH_ASSOC);
    echo "<hr>";
    echo "<h5 class='text-center mt-4'><i class='fa-solid fa-graduation-cap'></i> Regular Transactions <b>$titledate</b></h5>";
    echo "<div class='table-responsive pb-3'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-striped table-hover shadow display nowrap'  style='font-size: 12px'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction ID</th>";
    echo "<th>Student Number</th>";
    echo "<th>Full Name</th>";
    echo "<th>Type</th>";
    echo "<th>Year</th>";
    echo "<th>Course</th>";
    echo "<th>Applied For</th>";
    echo "<th>Purpose</th>";
    echo "<th>Remarks</th>";
    echo "<th>Assignee</th>";
    echo "<th>Date Applied</th>";
    echo "<th>Date Confirmed</th>";
    echo "<th>Payment Date</th>";
    echo "<th>Signed Date</th>";
    echo "<th class='text-primary fw-bolder'>Cycle Time (days)</th>";
    echo "<th>Release Date</th>";
    echo "<th>Released By</th>";
    echo "<th>Releasing Notes</th>";
    echo "<th>Verifier Notes</th>";
    echo "<th>Removed By</th>";
    echo "<th>Removed Date</th>";
    echo "<th>Removal Reason</th>";
    // echo "<th>Actions</th>";
    echo "</thead>";

    foreach ($result as $data0) {
      $temp_name0 = utf8_decode($data0['fullname']);
      $fullname0 = strtoupper(str_replace('?', 'Ñ', $temp_name0));
      $assignee0 = findAssignee($data0['assignee']);
      echo "<tr style='font-size: 13px'>";
      echo "<td>$data0[transactionid]</td>";
      echo "<td>$data0[stdn]</td>";
      echo "<td>$fullname0</td>";
      echo "<td>$data0[status]</td>";
      echo "<td>$data0[yeargrad]</td>";
      echo "<td>$data0[course]</td>";
      echo "<td> ".str_replace('%0D%0A',' <br> ',str_replace('%0D%0A',' <br> ',$data0['summary']) )."</td>";
      echo "<td>$data0[reason]</td>";
      echo "<td>$data0[remarks]</td>";
      echo "<td>$assignee0</td>";
      echo "<td>$data0[dateapp]</td>";
      echo "<td>$data0[dateconfirmed]</td>";
      echo "<td>$data0[paymentdate]</td>";
      echo "<td>$data0[signeddate]</td>";
      echo "<td class='text-primary fw-bolder text-center'>";
        if($data0['ctime'] == "0"){
            echo sprintf("%02d", intval($data0['ctime'] + 1));
        }
        elseif($data0['ctime'] == "1"){
            echo sprintf("%02d", intval($data0['ctime']));
        }
        elseif($data0['ctime'] > "0"){
            echo sprintf("%02d", intval($data0['ctime'] ));
        }else{
            // display nothing
        }
      echo "</td>";
      echo "<td>$data0[releasedate]</td>";
        if(!empty($data0['released_by'])){
            echo "<td>".findAssignee($data0['released_by'])."</td>";
        }else{
            echo "<td></td>";
        };
      echo "<td>$data0[releasing_remarks]</td>";
      echo "<td>$data0[vfnotes]</td>";
        if(!empty($data0['removed_by'])){
            echo "<td>".findAssignee($data0['removed_by'])."</td>";
        }else{
            echo "<td></td>";
        };
      echo "<td>$data0[removed_date]</td>";
      echo "<td class='text-danger fw-bolder'>$data0[info]</td>";

      echo "</tr>";
    }
  echo "</table></div>";

// $arraysdocsraw = [];

// echo "<table class=' table table-sm'>
//         <thead>
//             <tr><th>Average Cycle Time</th> <th><b class='text-danger'>".round(findCycleTime($sql2),3)." day/s</b></th></tr>
//             <tr><th>Status</th><th>Transaction Count</th></tr>
//         </thead>";
// foreach($result as $data){
//     echo "<tr><td>$data[remarks]</td><td>$data[transaction_count]</td></tr>";
//     $arraysdocsraw[] += $data["transaction_count"];
// }
// $sum = array_sum($arraysdocsraw);
// echo "<tr><td><b>Total Transactions Received</b></td><td>$sum</td></tr>";
// echo "</table>";

    //   echo "<td>";
    //     $user = new user();
    //     if($user->data()->groups == 1 || $user->data()->groups == 4){
    //       echo "<a href='info.php?tID=$data0[transactionid]&type=sp' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
    //     }elseif($user->data()->groups == 2){
    //       echo "<a href='ainfo3.php?tID=$data0[transactionid]&type=sp' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
    //     }elseif($user->data()->groups == 3){
    //       echo "<a href='info.php?tID=$data0[transactionid]&type=sp' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
    //     //}elseif($user->data()->groups == 4){
    //     //  echo "<a href='sinfo2.php?tID=$data0[transactionid]&type=sp' class='btn btn-sm  btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View Request Details'><i class='fa-solid fa-eye'></i></a>";
    //     }else{
    //       // display nothing
    //     }
    //   echo "</td>";