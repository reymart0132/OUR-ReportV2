<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
if (!empty($_SESSION['tn'])) {
$tn = $_SESSION['tn'];
} else {
    header("HTTP/1.1 403 Forbidden");
    exit;
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CEU Registrar ORD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css"  href="resource/css/main.css">
    <link rel='icon' href='resource/img/ceu.png' type='image/x-icon' sizes="16x16" />
    <script src="https://kit.fontawesome.com/909c1a5e64.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="loader-container">
        <div class="loader-logo"></div>
        <div class="loader-bar">
            <div class="progress"></div>
        </div>
        <div class="loader-text">Loading 0%</div>
    </div>
    <?php require_once('resource/menu/nav.php') ?>
    
    <header class="container-fluid header animate__animated  animate__slideInLeft">
        <div class="card bg-ceu">
    </header>
    <section>
         <div class="container mt-5">
             <div class="row justify-content-center">
                <div class="col-md-8 border shadow-sm p-5">
                    <h2 class="text-center mb-3"><b>Your Document Request is now Submitted</b></h2>
                    <p class="lead">Please take note of the transaction number: <strong class="text-info"><?php echo $tn; ?></strong></p>
                    <p>Our Student Records Assistant (SRA) will contact you as soon as possible once we have verified your enrollment/ records.<br><br>Your request is now in the queue.
                        Once instructed to pay, please make the payment <b class="text-danger">within 5 working days</b>, or your transaction will be <b class="text-danger">forfeited.</p></b>
                    <p>You may check the status of your request by visiting the website below:</p>
                    <p class="mb-0"><a href="checker" target="_blank">Document Status Checker</a></a></p> <br>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <a href="index.php" class="btn btn-hover color-3 w-100"> Return to Home</a>
                        </div>
                    </div>
                    
             </div>
         </div>
    </div>
    </section>
    </div>
    <button onclick="topFunction()" id="topButton" title="Return to Top"><i class="fa-solid fa-arrow-up"></i></button>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
    <script src="resource/js/loader.js"></script>
    <script src="resource/js/rtt.js"></script>
    </div>
</body>

<!-- All icons used are attributed to freepik and users below:
<a href="https://www.flaticon.com/free-icons/verification" title="verification icons">Verification icons created by Shahid-Mehmood - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/track" title="track icons">Track icons created by photo3idea_studio - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/quote-request" title="quote request icons">Quote request icons created by Freepik - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/question-and-answer" title="question and answer icons">Question and answer icons created by Linector - Flaticon</a>
<a href="https://www.flaticon.com/free-icons/customer-care" title="customer care icons">Customer care icons created by zero_wing - Flaticon</a>
-->
</html>