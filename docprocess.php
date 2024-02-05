<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
if (!empty($_SESSION['info']) && !empty($_POST['points'])) {
    $tnumber = uniqid('CMNL', false);
    var_dump($_SESSION['info']);
    $stdn = $_SESSION['info']['studentNumber'];
    $yearGraduated = $_SESSION['info']['yearGraduated'];
    $status = $_SESSION['info']['status'];
    $fullname = replaceNWithTilde($_SESSION['info']['fullName']);
    $course = $_SESSION['info']['course'];
    $reason = $_SESSION['info']['reason'];
    $contactNumber = $_SESSION['info']['contactNumber'];
    $emailAdress = $_SESSION['info']['emailAddress'];
    $facebook = $_SESSION['info']['facebook'];
    $points = $_POST['points'];
    $price = $_POST['hiddenPrice'];
    $specialinstruction = $_POST['sinstruction'];
    $summary = $_POST['items'];
    $_SESSION['tn'] = $tnumber;
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


if (!empty($_POST)) {
    $recaptcha_secret_key = '6LcZHmwoAAAAADZh4bK3HzmFGzLXvTvRs3XiQOsz';
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $recaptcha_secret_key,
        'response' => $recaptcha_response
    );

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    if ($captcha_success->success) {
        if (datevalidation($emailAdress) == false) {
            header("location:docrequest.php?error=MultipleTrans");
        } else {
            $transaction = new transaction($tnumber, $stdn, $yearGraduated, $status, $fullname, $course, $reason, $contactNumber, $emailAdress, $facebook, $points, $price, $specialinstruction,$summary);
            $transaction->insertTransaction();
            for ($i = 0; $i < count($order); $i++) {
                $item[$i] = new items($tnumber, "", $counts[$i], $order[$i]);
                $item[$i]->insertItem();
            }
            
            $open = true;
            include_once "vendor/sendmail.php";
            header("location:./success.php");
            echo "done";
        }
    } else {
        //display error message
        header("location:docrequest.php?error=captchaError");

        exit;
    }

    //insert codes here
}






?>