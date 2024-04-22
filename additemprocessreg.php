<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';


if (!empty($_POST['items']) && !empty($_POST['tn'])) {
    $price = $_POST['hiddenPrice'];
    $summary = $_POST['items'];
    $tnumber = $_POST['tn'];
    $points = $_POST['points'];
    $landing = $_POST['landing'];
} else {
    header("HTTP/1.1 403 Forbidden");
    exit;
}

if (!empty($_POST['items'])) {
    // var_dump($_SESSION['info']);
} else {
    header("HTTP/1.1 403 Forbidden");
    exit;
}

$text = $_POST['items'];
$pattern = '/^(.+?)\s*-\s*(\d+)\s*$/m';
// Initialize arrays to store matches
$order = array();
$counts = array();
// Use preg_match_all to find matches
preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);
// Extract matched values
foreach ($matches as $match) {
    $order[] = trim($match[1]);
    $counts[] = intval($match[2]);
}
            $dcommand = new items($tnumber);
            $dcommand->deleteItem();
            $transaction = new transaction($tnumber,'','', '','','','', '', '', '', $points, $price, '',$summary);
            $transaction->editTransactionreg();
            for ($i = 0; $i < count($order); $i++) {
                $item[$i] = new items($tnumber, "", $counts[$i], $order[$i]);
                $item[$i]->insertItem();
            }
            header("location:./".$landing.".php");

    //insert codes here






?>