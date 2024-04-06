<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$locker = new locker();
$locker->formLockerCheck();
if(!empty($_POST)){
    $_SESSION['info'] = $_POST;
    // var_dump($_SESSION['info']);
}else{
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
      <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">

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
            <div class="row">
                <div class="col-lg-12 p-0 bg-registrar3 d-none d-lg-block">
                <!-- <img src="resource/img/bg.jpg" class="img-fluid" alt="..."> -->
                </div>
            </div>
        </div>
    </header>
    <section class="section1">
        <div class="container p-3">
            <div class="row ofh justify-content-center">
                <div class="form-container ">
                    <h2 class="formh2">STEP 2 - Document Type Information </h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card carding">
                                <div class="card-header">
                                    Certificates and TOR without Attachments / Abroad Forms
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">This includes the following documents:</h6>
                                    <p class="card-text text-muted" style="font-size: 14px;">
                                        -Transcript of Record (Degree Holder or Non-Degree Holder)<br>
                                        -Transfer credential (Degree Holder or Non-Degree Holder)<br>
                                        -Certificates (Certificate of Enrollment/Graduation/EMI/Grades/To be Typed)<br>
                                        -Rating Cards<br>
                                        -Others
                                    </p>
                                    <a href="docrequest.php" class="btn btn-primary col-12  align-bottom">Apply Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card carding">
                                <div class="card-header">
                                    Certificates and TOR that includes Abroad Forms or CAV
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">This includes document with abroad forms such as the following:</h6>
                                    <p class="card-text text-muted" style="font-size: 14px;">
                                        -CHED - Certification, Authentication, and Verification,<br> 
                                        -<b>International / Foreign Academic Credential Evaluators</b> such as: 
                                        CGFNS, WES, ECE, ICAS, IQAS, NNAS, NYSED, NDEB, PEBC, Others <br><br><br>
                                    </p>
                                    <a href="spcdocrequest.php" class="btn btn-primary col-12 align-bottom">Apply Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="card carding">
                                <div class="card-header">
                                   *Important Notes
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">For Certificate of Internship and Course Syllabus</h6>
                                    <p class="card-text text-danger" style="font-size: 14px;">
                                        <b>-Please proceed to your College / School / Department.</b><br> 
                                    </p>
                                    <h6 class="card-title">For Certificate of Good Moral Character</h6>
                                    <p class="card-text text-danger" style="font-size: 14px;">
                                        <b>-Please proceed to Student Affairs Office (SAO) or email Ms. Jenny Ortiz (jsortiz@ceu.edu.ph)</b><br> 
                                    </p>
                                </div>
                            </div>
                        </div>
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

    <script src="vendor/js/bootstrap-select.min.js"></script>
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
</body>

<!-- All icons used are attributed to freepik and users below:
<a href="https://www.flaticon.com/free-icons/verification" title="verification icons">Verification icons created by Shahid-Mehmood - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/track" title="track icons">Track icons created by photo3idea_studio - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/quote-request" title="quote request icons">Quote request icons created by Freepik - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/question-and-answer" title="question and answer icons">Question and answer icons created by Linector - Flaticon</a>
<a href="https://www.flaticon.com/free-icons/customer-care" title="customer care icons">Customer care icons created by zero_wing - Flaticon</a>

</html>