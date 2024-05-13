<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$configsdocsraw = new config;
$consdocsraw = $configsdocsraw->con();
isLogin();
if(empty($_GET['monthPicker'])){
    $datesdocsraw2 = get_current_date2();
    }else{    
     $ndate = $_GET['monthPicker'];
    // Ensure the date format is compatible with strtotime
    $formatted_ndate = date("m/Y", strtotime($ndate));
    $datesdocsraw2 = $formatted_ndate;
}
if(!empty($_GET['alltime'])){
$sql = "SELECT remarks, COUNT(*) AS transaction_count
FROM tbl_spctransaction 
GROUP BY `remarks`";

$sql2 = "SELECT AVG(datediff(`signeddate`,`dateapp`)) AS `cycletime` FROM `tbl_spctransaction`";
}else{

$sql = "SELECT remarks, COUNT(*) AS transaction_count
FROM tbl_spctransaction WHERE YEAR(`dateapp`) = SUBSTRING_INDEX('$dateodocs2', '/', -1) 
        AND MONTH(`dateapp`) = SUBSTRING_INDEX('$dateodocs2', '/', 1) 
GROUP BY `remarks`";

$sql2 = "SELECT AVG(datediff(`signeddate`,`dateapp`)) AS `cycletime` FROM `tbl_spctransaction` WHERE `remarks` IN ('RELEASED', 'FOR RELEASE') 
AND YEAR(`dateapp`) = SUBSTRING_INDEX('$dateodocs2', '/', -1) 
AND MONTH(`dateapp`) = SUBSTRING_INDEX('$dateodocs2', '/', 1)";
}



$dataStatement = $consdocsraw->prepare($sql);
$dataStatement->execute();
$result = $dataStatement->fetchAll(PDO::FETCH_ASSOC);

$arraysdocsraw = [];

echo "<table class=' table table-sm'>
        <thead>
            <tr><th>Average Cycle Time</th> <th><b class='text-danger'>".round(findCycleTime($sql2),3)." day/s</b></th></tr>
            <tr><th>Status</th><th>Transaction Count</th></tr>
        </thead>";
foreach($result as $data){
    echo "<tr><td>$data[remarks]</td><td>$data[transaction_count]</td></tr>";
    $arraysdocsraw[] += $data["transaction_count"];
}
$sum = array_sum($arraysdocsraw);
echo "<tr><td><b>Total Transactions Received</b></td><td>$sum</td></tr>";
echo "</table>";