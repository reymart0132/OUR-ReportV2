<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'autoload.php';

$mail = new PHPMailer(true);

$body2 ="<h5><b>---THIS IS AN AUTO-GENERATED EMAIL MESSAGE, PLEASE DO NOT REPLY HERE---</b></h5><br>

        <p>Dear $clientName,</p><p>We appreciate your patience while we work on your request.</p>

        <p>We are happy to inform you that your requested document has been completed.
            You may claim your requested documents at the Office of the University Registrar (Releasing Section) and bring the following:</p>

        <ul>
            <li> One (1) valid identification </li>
            <li> Digital Screenshot or printed copy of this email confirmation </li>
        </ul>";

$body3 ="<p> If someone will receive your documents on behalf of you, please provide an <b> authorization letter addressed to Dr. Rhoda C. Aguilar, University Registrar, and attach a valid ID and the representative's ID. </b></p>

        <p>Upon receipt of this email, kindly contact the concerned SRA <b>(".$assignName." - ".$assignEmail.") or call (00632) 8735-68-77 / (00632) 8735-68-61 local 245 or 274 </b></p>
        
        <p>We would also want to request a few minutes of your time to assess the SRA <b>(".$assignName.")</b> who prepared your documents.</p>
        
        <p>Kindly click on the link: https://docs.google.com/forms/d/e/1FAIpQLScCCgIDuFkoCqIoA4Op9_RParPH-onPFvlYkhhYvO3wM0SDFw/viewform </p>
        
        <p>Thank you & Stay Safe!</p>
        
        
        <p><b>Note: If you have confirmed with your assigned SRA that the document/s you requested are for mailing, please disregard this email message</b>.
        <p>Documents not claimed after <b>Ninety (90) DAYS</b> will be discarded</p>
        
        <br><h5><b>---THIS IS AN AUTO-GENERATED EMAIL MESSAGE, PLEASE DO NOT REPLY HERE---</b></h5>";

$body= $body2.$body3;

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';     //platform
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ceuourmailerMNL@gmail.com';   //email
    $mail->Password   = 'hbckagpwwurwxpay';                   //password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom('ceuourmailerMNL@gmail.com');       //sender
    $mail->addAddress($emailAddress);

    //Content
    $mail->isHTML(true);
    echo $mail->Subject = 'CEU DOCUMENT READY FOR RELEASE - '.$_GET['transactionID'].' - (DO NOT REPLY)';
    $mail->Body    = $body;             //content
    
    $mail->send();
    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
