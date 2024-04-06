<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$view = new view();
$locker = new locker();
$locker->formLockerCheck();
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
                <div class="col-lg-12 p-0 bg-registrar2 d-none d-lg-block">
                <!-- <img src="resource/img/bg.jpg" class="img-fluid" alt="..."> -->
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container p-3">
            <div class="row ofh justify-content-center">
                <div class="form-container ">
                    <h2 class="formh2">STEP 1 - Student Info Request</h2>
                    <form action="transaction.php" method="POST">
                        <div class="row p-2">
                            <hr class="my-4">
                            <div class="col-md-5 mb-1">
                                <label for="studentNumber" class="form-label">Student Number</label>
                                <input type="text" class="form-control" id="studentNumber" name="studentNumber" required>
                                <small class="text-muted"><b>*Please enter 0000-00000 if you have forgotten your student number.</b></small>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="yearGraduated" class="form-label">Year Graduated or Last Enrolled (4 digits)</label>
                                <input type="text" class="form-control" id="yearGraduated" name="yearGraduated" min="1900" max="2099" step="1" value="" maxlength="4" required>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Undergraduate">Non-Degree Holder</option>
                                    <option value="Graduate">Bachelors Degree Holder</option>
                                    <option value="Masters">Masters Degree Holder</option>
                                    <option value="PHD">Doctorate Degree Holder</option>
                                </select>
                            </div>
                            <hr class="my-4">
                            <div class="col-12 mb-1">
                                <label for="fullName" class="form-label">Full Name </label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                                <small class="text-muted"><b>*Please enter the name that you have used during your tenure in CEU.</b></small>
                                <small class="text-muted ms-2">-Please follow the format (Lastname - FirstName - Middlename)</small>
                            </div>
                            <hr class="my-4">
                            <div class="col-md-8 mb-1">
                                <label for="course" class="form-label">Course <small class="text-muted"> (*Kindly use the course that appear on the suggestion box.)</small></label>
                                
                                <input class="form-control" list="courseoptions" name="course" id="course" placeholder="Type to search..." required>
                                <datalist id="courseoptions">
                                    <?php $view->listCourse();  ?>
                                </datalist>
                                </select>
                            </div>
                            <div class="col-md-4 b-3">
                                <label for="reason" class="form-label">Reason for Requesting</label>
                                <select class="form-select" id="reason" name="reason" required>
                                    <?php $view->listReason();  ?>
                                </select>
                            </div>
                            <hr class="my-4">
                            <div class="col-md-4 mb-1">
                                <label for="contactNumber" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="emailAddress" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="emailAddress" name="emailAddress" required>
                            </div>
                            <div class="col-md-4 mb-1 ">
                                 <label for="basic-url" class="form-label">Your Messenger URL</label>
                                 <div class="input-group mb-3">
                                     <span class="input-group-text" id="basic-addon3">fb.com/</span>
                                     <input type="text" class="form-control" id="basic-url" name ="facebook" aria-describedby="basic-addon3">
                                    </div>
                                    <small class="small-text text-success text-end  ">*for easier and faster communication</small>
                            </div>
                            <div class="col-12 mb-1">
                                <small class="text-muted" ><b>*Please ensure the correctness of the email address,FB Messenger Account and Phone Number that you have entered as this will be used as the primary medium of communication that will be used to contact you.</b></small>
                            </div>
                            <hr class="my-4">
                             <div class="row justify-content-center ">
                                <div class="form-group col-md-6 justify-content-center order-last">
                                    <!-- <div class="g-recaptcha" data-sitekey="6LcZHmwoAAAAAMud5aRHZVyMKm80GzSqMM6fFoXz"></div> -->
                                    <button type="submit" class="col-12 btn btn-sm btn-primary">Submit</button>
                                </div>
                                <div class="form-group col-md-6">
                                    <small id="emailHelp" class="text-muted">
                                        <p>In compliance with the <strong>Data Privacy Act of 2012</strong> (R.A. No. 10173, Chapter 1, Section 2),</p>
                                        <p>If you cannot visit us in person, the following are the requirements for an Authorized Person:</p>
                                        <ul>
                                            <li>Authorization Letter</li>
                                            <li>Valid ID of the Applicant and Authorized Person with specimen signature (Xerox Copy)</li>
                                        </ul>
                                        <p><strong>Note:</strong> Documents not claimed after Ninety (90) DAYS will be discarded.</p>
                                        <p class="mb-0">
                                            <strong>Side Note:</strong> Please refer to the processing times for each document:<br>
                                            - Transcript of Records (TOR): 15 working days<br>
                                            - Certificates: 3 working days<br>
                                            - Diploma: 21 working days<br><br>
                                            <em>*By submitting this form, you grant us permission to use your data for research and communication purposes only.</em>
                                        </p>
                                    </small>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
           
    </div>
    </section>
   
    </div>
    <footer class="bfooter text-light p-3">
        <p class="ftext text-center">© 2023 Copyright <b>Centro Escolar University , Office of University Registrar</b>.  Developed by <b>Reymart Bolasoc (reymart.bolasoc@gmail.com) </b> & <b>Jerrick Anatalio (jganatalio@ceu.edu.ph)</b> </p>
    </footer>
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