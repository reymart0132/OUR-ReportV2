<?php
ob_start();
if(isset($open) && $open){
  //do what it is supposed to do
}
else {
  header("HTTP/1.1 403 Forbidden");
  exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'autoload.php';

$mail = new PHPMailer(true);


$body ="
<p>Dear Escolarian,<br>Greetings of peace!</p>
<p>Unfortunately, After a thorough review we did not proceed with your request <b>($_GET[transactionID])</b> this time</p>
<p>Please take note of the reason: $_GET[info]</p>
<p>If you think this is a mistake please contact -<b> dcaudal@ceu.edu.ph</b></p>
<p>You may still check the status of your request by visiting the website below</p>
<p>ceumnlregistrar.com/ord/status</p>
<br><p><b>THIS IS AN AUTO GENERATED EMAIL PLEASE DO NOT REPLY</b></p>";

try {
    //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';     //platform
  $mail->SMTPAuth = true;
  $mail->Username = 'ceuourmailerMNL@gmail.com';   //email
  $mail->Password = 'hbckagpwwurwxpay';                    //password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  //Recipients
  $mail->setFrom('ceuourmailerMNL@gmail.com');       //sender
  $mail->addAddress($emailAddress);

  //Content
  $mail->isHTML(true);
  $mail->Subject = 'CEU DOCUMENT REQUEST -' . $_GET['transactionID'];
  $mail->Body = $body;             //content

  $mail->send();
  echo 'Message has been sent';
    // ob_end_flush();
    // header("location:./success.php");
} catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  // die();
  // ob_end_flush();
    // header("location:./success.php");
}

?>
