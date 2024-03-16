<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CEU Registrar ORD FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css"  href="resource/css/kcej_faq.css">
    <link rel="stylesheet" type="text/css"  href="resource/css/main.css">
    <link rel='icon' href='resource/img/ceu.png' type='image/x-icon' sizes="16x16" />
    <script src="https://kit.fontawesome.com/03ca298d2d.js" crossorigin="anonymous"></script>

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
                <div class="col-lg-12 p-0 bg-faq">
                <!-- <img src="resource/img/bg.jpg" class="img-fluid" alt="..."> -->
                </div>
                <!-- <div class="col-lg-5 bg-light">
                    <div class="card-body p-5">
                        BOX 2 TEXT
                    </div>
                </div> -->
            </div>
        </div>
    </header>
    <div class="section1 p-3" id='services'>
        <section>
            <div class = "row">
                <div class="col-12">
                    <h5 class="card-title big-txt-ceu text-center mb-3 animate__animated  animate__backInDown"><span class="big-txt-ceu2"> F</span>REQUENTLY <span class="big-txt-ceu2">A</span>SKED <span class="big-txt-ceu2"> Q</span>UESTIONS</h5>
                </div>

                <div class=" row inner-faq p-3 mb-3 d-flex justify-content-center">
                    <div class="col-md-8 px-2 mt-2">
                        <div class="accordion" id="accordionExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fa-regular fa-circle-question fa-3x big-txt-faq"></i> <h6 class="sm-txt-faq">How to request for a Document?</h6>
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <i class="fa-solid fa-hand-point-right fa-2x big-txt-faq-inv"></i> <h6 class="sm-txt-faq-inv">Click this <a href="information.php">LINK</a>, fill up the form, attach the needed documents (if required), and wait for the email response of the Student Records Assistant (SRA) who will guide you throughout your document request including payment process.</h6>
                                </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa-regular fa-circle-question fa-3x big-txt-faq"></i> <h6 class="sm-txt-faq">How long will it take to process my Document/s?</h6>
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <i class="fa-solid fa-hand-point-right fa-2x big-txt-faq-inv"></i> <h6 class="sm-txt-faq-inv">It will depend on which type of Document you requested. 3-5 working days for certificates, 10-15 working days for TOR, 3-4 weeks for Diploma and CHED-CAV. Processing time will start upon submission of proof of payment to the SRA-in-charge</h6>
                                </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa-regular fa-circle-question fa-3x big-txt-faq"></i> <h6 class="sm-txt-faq">How will I know if my requested Document/s are ready for release?</h6>
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <i class="fa-solid fa-hand-point-right fa-2x big-txt-faq-inv"></i> <h6 class="sm-txt-faq-inv">You will receive an email message informing you that your requested document/s are ready for release. You may also check the status of your request <a href="#">HERE</a>.</h6>
                                </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="fa-regular fa-circle-question fa-3x big-txt-faq"></i> <h6 class="sm-txt-faq">How will I know if my requested Document/s are ready for release?</h6>
                                </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <i class="fa-solid fa-hand-point-right fa-2x big-txt-faq-inv"></i>  <h6 class="sm-txt-faq-inv">You will receive an email message informing you that your requested document/s are ready for release. You may also check the status of your request <a href="#">HERE</a>.</h6>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 px-2 mt-2  text-center">
                    <div class="inner p-2">
                        <img class="services" height="75px" src="resource/img/support.png" alt="Question and answer icons created by Linector">
                        <h6 class="card-title big-txt-ceu3 text-center mb-2 mt-4">OUR Live Chat Support Services via (FB Messenger)</h6>    
                        <p class="itext">You may view our live support services below. OUR Chat support is only available Monday - Saturday from 8:00am to 4:00pm (GMT+8)</p>
                        <a href="https://m.me/116733688185852" target="_blank" class="btn btn-hover color-3 text-center me-3 p-2"> Document Request Inquiries</a>
                        <a href="https://m.me/118388904686307"  target="_blank" class="btn btn-hover color-3 text-center  me-3 p-2"> Check the Status of my Records/Clearance </a>
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
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "118388904686307");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

<!-- All icons used are attributed to freepik and users below:
<a href="https://www.flaticon.com/free-icons/verification" title="verification icons">Verification icons created by Shahid-Mehmood - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/track" title="track icons">Track icons created by photo3idea_studio - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/quote-request" title="quote request icons">Quote request icons created by Freepik - Flaticon</a>

<a href="https://www.flaticon.com/free-icons/question-and-answer" title="question and answer icons">Question and answer icons created by Linector - Flaticon</a>
<a href="https://www.flaticon.com/free-icons/customer-care" title="customer care icons">Customer care icons created by zero_wing - Flaticon</a>
-->
</html>