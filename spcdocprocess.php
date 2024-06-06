<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
if (!empty($_SESSION['info'])) {
    $tnumber = uniqid('CMNL', false);
    var_dump($_SESSION['info']);
    $stdn = $_SESSION['info']['studentNumber'];
    $yearGraduated = $_SESSION['info']['yearGraduated'];
    $status = $_SESSION['info']['status'];
    $fullname = kcej_clean_name(replaceNWithTilde($_SESSION['info']['fullName']));
    $course = $_SESSION['info']['course'];
    $reason = $_SESSION['info']['reason'];
    $contactNumber = $_SESSION['info']['contactNumber'];
    $emailAdress = $_SESSION['info']['emailAddress'];
    $facebook = $_SESSION['info']['facebook'];
    $type = $_POST['tod']." ".$_POST['textbox'];
    // $points = $_POST['points'];
    // $price = $_POST['hiddenPrice'];
    // $specialinstruction = $_POST['sinstruction'];
    $_SESSION['tn'] = $tnumber;    
    var_dump($_FILES);
} else {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
echo "here";

// $text = $_POST['items'];
// $pattern = '/^(.+?)\s*-\s*(\d+)\s*$/m';
// // Initialize arrays to store matches
// $order = array();
// $counts = array();
// // Use preg_match_all to find matches
// preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);
// // Extract matched values
// foreach ($matches as $match) {
//     $order[] = trim($match[1]);
//     $counts[] = intval($match[2]);
// }


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
        if (datevalidation2($emailAdress) == false) {
            header("location:spcdocrequest.php?error=MultipleTrans");
        } else {
            
            $spctransaction = new spctransaction($tnumber, $stdn, $yearGraduated, $status, $fullname, $course, $reason, $contactNumber, $emailAdress, $facebook,$_FILES['doc1'], $_FILES['doc2'], $_FILES['doc1']['tmp_name'], $_FILES['doc2']['tmp_name'],$type);
            $spctransaction->insertTransaction();
            $open = true;
            include_once "vendor/sendmail.php";
            header("location:./success.php");
            echo "done";
        }
    } else {
        //display error message
        header("location:spcdocrequest.php?error=captchaError");

        exit;
    }

    //insert codes here
}
?>