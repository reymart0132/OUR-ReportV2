<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$configodocs = new config;
$conodocs = $configodocs->con();
if(empty($_GET['monthPicker'])){
    $dateodocs2 = get_current_date2();
    }else{    
     $ndate = $_GET['monthPicker'];
    // Ensure the date format is compatible with strtotime
    $formatted_ndate = date("m/Y", strtotime($ndate));
    $dateodocs2 = $formatted_ndate;
}
if(!empty($_GET['alltime'])){
    $sql = "SELECT 
    A.id,
    COALESCE(ST1.transaction_count, 0) AS transaction_count,
    COALESCE(ST2.total_points, 0) AS total_points,
    COALESCE(ST1.transaction_count, 0) + COALESCE(ST2.total_points, 0) AS overall_points
FROM 
    tbl_accounts A
LEFT JOIN (
    SELECT 
        assignee, 
        COUNT(*) * 2 AS transaction_count 
    FROM 
        tbl_spctransaction ST 
    WHERE 
        remarks NOT IN ('RELEASED', 'PENDING', 'FOR ASSIGNMENT') 
    GROUP BY 
        assignee
) ST1 ON A.id = ST1.assignee
LEFT JOIN (
    SELECT 
        assignee, 
        COALESCE(SUM(points), 0) AS total_points 
    FROM 
        tbl_transaction 
    WHERE 
        remarks IN ('RELEASED') 
    GROUP BY 
        assignee
) ST2 ON A.id = ST2.assignee
WHERE 
    (A.groups = 4 OR A.groups = 1) 
    AND A.id NOT IN ('37','33') 
ORDER BY 
    overall_points DESC";

}else{

    $sql = "SELECT 
    A.id,
    COALESCE(ST1.transaction_count, 0) AS transaction_count,
    COALESCE(ST2.total_points, 0) AS total_points,
    COALESCE(ST1.transaction_count, 0) + COALESCE(ST2.total_points, 0) AS overall_points
FROM 
    tbl_accounts A
LEFT JOIN (
    SELECT 
        assignee, 
        COUNT(*) * 2 AS transaction_count 
    FROM 
        tbl_spctransaction ST 
    WHERE 
        remarks NOT IN ('PENDING', 'FOR ASSIGNMENT') 
        AND YEAR(ST.dateapp) = SUBSTRING_INDEX('$dateodocs2', '/', -1) 
        AND MONTH(ST.dateapp) = SUBSTRING_INDEX('$dateodocs2', '/', 1) 
    GROUP BY 
        assignee
) ST1 ON A.id = ST1.assignee
LEFT JOIN (
    SELECT 
        assignee, 
        COALESCE(SUM(points), 0) AS total_points 
    FROM 
        tbl_transaction 
    WHERE 
        remarks IN ('RELEASED','FOR RELEASE') 
        AND YEAR(dateapp) = SUBSTRING_INDEX('$dateodocs2', '/', -1) 
        AND MONTH(dateapp) = SUBSTRING_INDEX('$dateodocs2', '/', 1) 
    GROUP BY 
        assignee
) ST2 ON A.id = ST2.assignee
WHERE 
    (A.groups = 4 OR A.groups = 1) 
    AND A.id NOT IN ('37','33') 
ORDER BY 
    overall_points DESC";
}

$dataStatement = $conodocs->prepare($sql);
$dataStatement->execute();
$result = $dataStatement->fetchAll(PDO::FETCH_ASSOC);

// Initialize an empty array to store data
$graphData = array();

// Populate the graphData array with results from the query
foreach ($result as $row) {
    $graphData[$row['id']] = $row['overall_points'];
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
foreach ($graphData as $id => $overall_ranking) {
    // Calculate the width of each bar based on the total points
    $bar_width = ($overall_ranking / max($graphData)) * 100;
    echo '<tr>';
    echo '<td width= "30%" style="font-size:80%; white-space: nowrap;">' . findassignee($id) . ':</td>';
    echo '<td>';
    echo '<div class="bar" style="width: ' . $bar_width . '%; text-align:center; font-size:80%;">' . round($overall_ranking,2) . ' pts </div>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

?>