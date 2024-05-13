<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$configndocsraw = new config;
$conndocsraw = $configndocsraw->con();
isLogin();
if(empty($_GET['monthPicker'])){
    $datendocsraw2 = get_current_date2();
    }else{    
     $ndate = $_GET['monthPicker'];
    // Ensure the date format is compatible with strtotime
    $formatted_ndate = date("m/Y", strtotime($ndate));
    $datendocsraw2 = $formatted_ndate;
}
if(!empty($_GET['alltime'])){
$sql = "SELECT remarks, COUNT(*) AS transaction_count
FROM tbl_transaction 
GROUP BY `remarks`";

$sql2 = "SELECT AVG(datediff(`signeddate`,`dateapp`)) AS `cycletime` FROM `tbl_transaction`";

}else{

$sql = "SELECT remarks, COUNT(*) AS transaction_count
FROM tbl_transaction WHERE YEAR(`dateapp`) = SUBSTRING_INDEX('$dateodocs2', '/', -1) 
        AND MONTH(`dateapp`) = SUBSTRING_INDEX('$dateodocs2', '/', 1) 
GROUP BY `remarks`";

$sql2 = "SELECT AVG(datediff(`signeddate`,`dateapp`)) AS `cycletime` FROM `tbl_transaction` WHERE `remarks` IN ('RELEASED', 'FOR RELEASE') 
AND YEAR(`dateapp`) = SUBSTRING_INDEX('$dateodocs2', '/', -1) 
AND MONTH(`dateapp`) = SUBSTRING_INDEX('$dateodocs2', '/', 1)";
}



$dataStatement = $conndocsraw->prepare($sql);
$dataStatement->execute();
$result = $dataStatement->fetchAll(PDO::FETCH_ASSOC);

$arrayndocsraw = [];

echo "<table class=' table table-sm'>
        <thead>
            <tr><th>Average Cycle Time</th> <th><b class='text-danger'>".round(findCycleTime($sql2),3)." day/s</b></th></tr>
            <tr><th>Status</th><th>Transaction Count</th></tr>
        </thead>";
foreach($result as $data){
    echo "<tr><td>$data[remarks]</td><td>$data[transaction_count]</td></tr>";
    $arrayndocsraw[] += $data["transaction_count"];
}
$sum = array_sum($arrayndocsraw);
echo "<tr><td><b>Total Transactions Received</b></td><td>$sum</td></tr>";
echo "</table>";