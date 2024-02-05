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
            <div class="row">
                <div class="col-lg-7 p-0 bg-registrar">
                <!-- <img src="resource/img/bg.jpg" class="img-fluid" alt="..."> -->
                </div>
                <div class="col-lg-5 bg-light">
                <div class="card-body p-5">
                    <h5 class="card-title big-txt-ceu text-center"> <i class="fa-solid fa-building-columns"></i> MISSION STATEMENT</h5>
                    <p class="card-text text-center mt-5">The Centro Escolar University Office of the Registrar supports the colleges/schools and the university in realizing its commitment for the total development of students by providing efficient and quality service in terms of registering, updating, evaluating and safekeeping of student records, participating in curriculum making/revision and implementing the University and CHED policies, rules and regulations.</p>
                </div>
                </div>
            </div>
        </div>
    </header>
    <div class="section1 p-3" id='services'>
        <section>
            <div class = "row">
                <div class="col-12">
                    <h5 class="card-title big-txt-ceu text-center mb-3 animate__animated  animate__backInDown"><span class="big-txt-ceu2"> OUR</span> ONLINE SERVICES</h5>
                </div>
                <div class="col-md-3 px-2 text-center servc">
                    <div class="inner p-3 animate__animated  animate__backInDown">
                        <img class="services" height="75px" src="resource/img/request.png" alt="Verification icons created by Shahid-Mehmood">
                        <h6 class="card-title big-txt-ceu3 text-center mb-2 mt-4">Online Request for Documents</h6>
                        <p class="itext">Online request of student records / Certificates such as Transcript of Records, Diploma, EMI etc.</p>
                        <a href="information.php" class="btn btn-hover color-3 text-center"> Request a Document</a>
                    </div>
                </div>
                <div class="col-md-3 px-2  text-center servc">
                    <div class="inner p-3 animate__animated  animate__backInDown">
                        <img class="services" height="75px" src="resource/img/tracking.png" alt="Track icons created by photo3idea_studio">
                        <h6 class="card-title big-txt-ceu3 text-center mb-2 mt-4">Track Request Status</h6>
                        <p class="itext">Check the real-time status of Online Request for Documents via Transaction Number. </p>
                        <a href="" class="btn btn-hover color-3 text-center"> Track my Transaction</a>
                    </div>
                </div>
                <div class="col-md-3 px-2 text-center servc">
                    <div class="inner p-3 animate__animated  animate__backInDown">
                        <img class="services" height="75px" src="resource/img/verification.png" alt="Quote request icons created by Freepik - Flaticon">
                        <h6 class="card-title big-txt-ceu3 text-center mb-2 mt-4">Verification of Student Records</h6>
                        <p class="itext">Allows user to verify the authenticity of student records of alumna and former students of CEU.  </p>
                        <a href="https://www.ceumnlregistrar.com/caveportal/regform" class="btn btn-hover color-3 text-center"> Proceed to Verification</a>
                    </div>
                </div>
                <div class="col-md-3 px-2  text-center servc">
                    <div class="inner p-2 animate__animated  animate__backInDown">
                        <img class="services" height="75px" src="resource/img/faq.png" alt="Question and answer icons created by Linector">
                        <h6 class="card-title big-txt-ceu3 text-center mb-2 mt-4">Frequently Asked Questions</h6>    
                        <p class="itext">View frequently asked question and inquire about OUR Procedure</p>
                        <a href="" class="btn btn-hover color-3 text-center"> Proceed to FAQ</a>
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