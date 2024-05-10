<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$configndocs = new config;
$conndocs = $configndocs->con();
if(empty($_GET['monthPicker'])){
    $datendocs2 = get_current_date2();
    }else{    
     $ndate = $_GET['monthPicker'];
    // Ensure the date format is compatible with strtotime
    $formatted_ndate = date("m/Y", strtotime($ndate));
    $datendocs2 = $formatted_ndate;
}
if(!empty($_GET['alltime'])){
    $sql = "SELECT a.id, COALESCE(SUM(t.points), 0) AS total_points FROM tbl_accounts a LEFT JOIN tbl_transaction t ON a.id = t.assignee WHERE (a.groups = 4 OR a.groups = 1) AND a.id NOT IN ('37','33') AND t.remarks IN ('RELEASED','FOR RELEASE') GROUP BY a.id ORDER BY total_points DESC";

}else{

    $sql = "SELECT a.id, COALESCE(SUM(t.points), 0) AS total_points FROM tbl_accounts a LEFT JOIN tbl_transaction t ON a.id = t.assignee WHERE (a.groups = 4 OR a.groups = 1) AND a.id NOT IN ('37','33') AND t.remarks IN ('RELEASED','FOR RELEASE') AND YEAR(t.dateapp) = SUBSTRING_INDEX('$datendocs2', '/', -1) AND MONTH(t.dateapp) = SUBSTRING_INDEX('$datendocs2', '/', 1) GROUP BY a.id ORDER BY total_points DESC";
}
    $dataStatement = $conndocs->prepare($sql);
    $dataStatement->execute();
    $result = $dataStatement->fetchAll(PDO::FETCH_ASSOC);

// Initialize an empty array to store data
$graphData = array();

// Populate the graphData array with results from the query
foreach ($result as $row) {
    $graphData[$row['id']] = $row['total_points'];
}

// Sort the data by total points in ascending order

// HTML for the horizontal bar graph
echo '<style>
    .bar-graph-table {
        width: 100%;
    }
    .bar-graph-table td {
        padding: 5px;
        text-align: left;
    }
    .bar-graph-table .bar {
        background: linear-gradient(to right, #007bff, #8a2be2, #ff69b4); /* Gradient from blue to pink */
        border-radius: 5px;
        height: 20px; /* Set a fixed height for the bars */
        line-height: 20px; /* Center the text vertically */
        color: #FFF;
    }
</style>';
echo '<table class=" table table-sm bar-graph-table" cellspacing="0">';
foreach ($graphData as $id => $total_points) {
    // Calculate the width of each bar based on the total points
    $bar_width = ($total_points / max($graphData)) * 100;
    echo '<tr>';
    echo '<td width= "30%" style="font-size:80%; white-space: nowrap;">' . findassignee($id) . ':</td>';
    echo '<td>';
    echo '<div class="bar" style="width: ' . $bar_width . '%; text-align:center; font-size:80%;">' . round($total_points,2) . ' pts </div>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

?>