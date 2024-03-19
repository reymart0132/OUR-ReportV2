<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$locker = new locker();
$locker->formLockerCheck();
$view = new view();
if (!empty($_SESSION['info'])) {
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
                <div class="col-lg-12 p-0 bg-registrar4 d-none d-lg-block">
                <!-- <img src="resource/img/bg.jpg" class="img-fluid" alt="..."> -->
                </div>
            </div>
        </div>
    </header>
    <section class="section1">
        <div class="container-fluid p-3">
            <form action="spcdocprocess.php" method ="POST" enctype="multipart/form-data">
            <div class="row ofh justify-content-center">
                    <div class="col-md-8">
                        <div class="form-container ">
                            <h2 class="formh2">STEP 3 - Special Document Request Form </h2>
                            <?php if(!empty($_GET['error'])){
                                CheckError($_GET['error']);
                            }
                            ?>
                            <h6> Please select the type of special document you would like to request. </h6>
                            
                            <div class="container mt-2">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 b-3">
                                        <label for="tod" class="form-label">Type of Document</label>
                                        <select class="form-select" id="tod" name="tod" required onchange="toggleTextBox()">
                                            <option value="CAV">CHED CERTIFICATION AUTHENTICATION &amp; VERIFICATION (CAV)</option>
                                            <option value="CAV-UG">CHED CERTIFICATION AUTHENTICATION &amp; VERIFICATION (CAV)- Undergrad</option>
                                            <option value="Abroad Forms">Abroad Forms</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 b-3 p-1" id="textboxContainer" style="display: none;">
                                        <label for="textbox" class="form-label">Please indicate the name of the Abroad Form:</label>
                                        <input type="text" class="form-control" id="textbox" name="textbox" placeholder="IQAS/NCLEX/WES/etc." readonly>
                                    </div>
                                    <div class="form-group col-md-5 mt-5 border p-5 ">
                                        <h6 class="text-center" for="studentN"><b id="title1">Transcript of Records</b> <br />(File Requirement Number 1)</h6>
                                        <input type="file" class="file-upload" name="doc1" id="file1" accept=".pdf" onchange="validateFileInput(this)">
                                        <small class="text-muted"> <br />
                                        *Please ensure the correctness of the pdf file max(2MB). Incorrect requirements uploaded may <b>result to forfeiting of your application.</b></em></b></small>
                                        <small class="text-muted"> <br />
                                        - Make sure to follow the instructions on the right side of the page.<br />
                                        - Do not upload anything if you do not have the requirements needed</b></em></b></small>
                                    </div>
                                    <div class="form-group col-md-5 mt-5 border p-5">
                                        <h6 class="text-center" for="studentN"><b>DIPLOMA</b> <br />(File Requirement Number 2)</h6>
                                        <input type="file" class="file-upload" name="doc2" accept=".pdf" onchange="validateFileInput(this)">
                                        <small class="text-muted"> <br />
                                        *Please ensure the correctness of the pdf file max(2MB). Incorrect requirements uploaded may <b>result to forfeiting of your application.</b></em></b></small>
                                        <small class="text-muted"> <br />
                                        - Make sure to follow the instructions on the right side of the page.<br />
                                        - Do not upload anything if you do not have the requirements needed</b></em></b></small>
                                    </div>
                                    <br><small class="text-danger mt-3"><b>*While applications may still be submitted in the absence of the required documents, it is important to note that the processing time for your application may be extended. This is due to the necessity of obtaining and providing the required documents prior to the creation of the abroad form requirements.</b></small>
                                    <div class="form-group col-md-5 mt-2">
                                        <div class="pt-3 d-flex justify-content-center">
                                            <div class="g-recaptcha" data-sitekey="6LcZHmwoAAAAAMud5aRHZVyMKm80GzSqMM6fFoXz"></div>
                                        </div>
                                        <input type="submit" value="Place Order" class="btn btn-primary col-12 mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                        <h2>For CAV Request</h2>
                        <h5 class="text-muted">- Requirements for faster processing of CAV</h5>
                        <p class="text-info"><strong >1. Scanned Original Copy of Transcript of Record(TOR)<br>
                        2. Scanned Original Copy of DIPLOMA </strong></p>
                        <h5 class="text-muted">- Guidelines</h5>
                        <p class="text-muted"><strong>1. We will only accept scanned "ORIGINAL COPY" of the TOR and Diploma are accepted</strong><br>
                    - transactions with scanned CTC of the TOR and Diploma will be denied.<br><strong>2.TOR with remarks of  <em class="text-danger">for board exam,for evaluation,for transfer,for employment are not accepted</em></strong>
                    <br><strong>3. If you do not have the requirements; you may still submit the Form without uploading anything however please expect a longer turnover time of your request</p>
                    <br>
                    <h2>For Abroad Forms</h2>
                        <h5 class="text-muted">- Requirements</h5>
                        <p class="text-info"><strong>1. Scanned,Signed and accomplished Abroad Forms <br>
                        2. Diploma (optional, for reference purposes) </strong></p>
                        <h5 class="text-muted">- Guidelines</h5>
                        <p class="text-muted"><strong>1. Only forms from abroad that have a signature and all necessary information must be  filled out by the requester.</strong><br><strong>2. Make sure that the scanned copy is clear and that all necesary are clear and visible.</strong><strong><br>3. Incorrect uploads may result in forfeiture of your transaction.</strong> </p>
                    </div>
                </form>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
    function toggleTextBox() {
        var selectedOption = document.getElementById("tod").value;
        var textboxContainer = document.getElementById("textboxContainer");
        var textbox = document.getElementById("textbox");
        var title = document.getElementById("title1");
        var file1 = document.getElementById("file1");

        if (selectedOption === "Abroad Forms") {
            textboxContainer.style.display = "block";
            textbox.removeAttribute("readonly");
            textbox.setAttribute('required', 'required')
            title.innerHTML = "Signed Abroad Forms";
            file1.setAttribute('required', 'required');
            
            
        } else {
            textboxContainer.style.display = "none";
            textbox.setAttribute("readonly", "readonly");
            title.innerHTML = "Transcript of Records";
            textbox.removeAttribute("required");
            file1.removeAttribute('required');
        }
    }
</script>
<script>
    function validateFileInput(input) {
        var fileSize = input.files[0].size; // in bytes
        var fileType = input.files[0].type;

        // Check file size (2MB limit)
        if (fileSize > 2 * 1024 * 1024) {
            alert('File size exceeds the 2MB limit.');
            input.value = ''; // Clear the file input
            return false;
        }

        // Check file type (accept only PDF)
        if (fileType !== 'application/pdf') {
            alert('Invalid file type. Please upload a PDF file.');
            input.value = ''; // Clear the file input
            return false;
        }

        return true; // File is valid
    }

    // Optional: Add form submission event listener with validation for all forms
    function validateFile(form) {
        var fileInput = form.querySelector('.file-upload');
        return validateFileInput(fileInput);
    }
</script>

    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
</body>

<!-- All icons used are attributed to freepik and users below:
<a href="https://www.flaticon.com/free-icons/verification" title="verification icons">Verification icons created by Shahid-Mehmood - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/track" title="track icons">Track icons created by photo3idea_studio - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/quote-request" title="quote request icons">Quote request icons created by Freepik - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/question-and-answer" title="question and answer icons">Question and answer icons created by Linector - Flaticon</a>
<a href="https://www.flaticon.com/free-icons/customer-care" title="customer care icons">Customer care icons created by zero_wing - Flaticon</a>-->

</html>