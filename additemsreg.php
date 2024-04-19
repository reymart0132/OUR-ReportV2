<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$view = new view();
$user = new user();
isRAdmin($user->data()->groups);
$tn = $_GET['transactionID'];
$landing = $_GET['landing'];
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
        <div class="container-fluid p-3">
            <form action="additemprocessreg.php" method ="POST">
            <div class="row ofh justify-content-center">
                    <div class="col-md-8">
                        <div class="form-container ">
                            <h2 class="formh2">STEP 3 - Document Order Form </h2>
                            <?php if(!empty($_GET['error'])){
                                CheckError($_GET['error']);
                            }
                            ?>
                            <h6> Please input the quantity of the document that you want to request </h6>
                            
                            <div class="container mt-5">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="px-2 py-1">Item Code</th>
                                            <th class="px-2 py-1">Item</th>
                                            <th class="px-2 py-1">Price</th>
                                            <th class="px-2 py-1">Quantity</th>
                                            <th class="px-2 py-1 d-none">Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $view->listAppliedFor(); ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mt-3">
                            <strong>Total Price: ₱</strong> <span id="totalPrice"><b>0</b></span>
                            <input type="hidden" id="hiddenPrice" name="hiddenPrice" value="0" readonly>
                            <input type="hidden" id="totalPoints" name="points" placeholder="Total Points" readonly>
                            <input type="hidden" value="<?php echo $tn; ?>" name="tn" placeholder="Total Points" readonly>
                            <input type="hidden" id="landing" name="landing" value="<?php echo $landing; ?>">
                        </div>
                        <div class="mt-3">
                            <h6>Order Summary</h6>
                            <textarea id="itemList" name="items" class="form-control" rows="6" readonly></textarea>
                        </div>
                        <input type="submit" value="Place Order" class="btn btn-primary col-12 mt-5">
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

    <script>
    let firstChange = true; // Flag to track the first change

    function updateTotal() {
        const rows = document.querySelectorAll('tbody tr');
        let total = 0;
        let totalPoints = 0; // New variable for total points
        let itemList = "";

        rows.forEach(row => {
            const priceCell = row.querySelector('.px-2.py-1:nth-child(3) small');
            const pointsCell = row.querySelector('.px-2.py-1:nth-child(5) small');
            const appliedForCell = row.querySelector('.px-2.py-1:nth-child(2) div:first-child');
            const price = parseFloat(priceCell.textContent);
            const points = parseFloat(pointsCell.textContent);
            const quantity = parseInt(row.querySelector('input[type="number"]').value);

            if (!isNaN(price) && !isNaN(points) && !isNaN(quantity) && quantity > 0) {
                total += price * quantity;
                totalPoints += points * quantity; // Calculate total points

                // Append the item name (without Notes) and quantity to the itemList
                itemList += `${appliedForCell.textContent} - ${quantity}\n`;
            }
        });

        // Apply the red highlight to the total price when there is a change on the item list for the first time
        const totalPriceElement = document.getElementById('totalPrice');
        const totalPointsElement = document.getElementById('totalPoints'); // New line to get the total points input field
        const hiddenPrice = document.getElementById('hiddenPrice');
        totalPriceElement.textContent = total.toFixed(2);
        totalPointsElement.value = totalPoints; // Set the total points in the input field
        hiddenPrice.value = total.toFixed(2);

        if (firstChange) {
            totalPriceElement.classList.add('highlight-total');
            firstChange = false; // Set the flag to false after the first change
        }

        document.getElementById('itemList').value = itemList;
        
    }

    function highlightTotalOnce() {
        // Apply the red highlight to the total price when there is a change on the item list for the first time
        const totalPriceElement = document.getElementById('totalPrice');
        if (firstChange) {
            totalPriceElement.classList.add('highlight-total');
            firstChange = false; // Set the flag to false after the first change
        }
        window.addEventListener('scroll', function() {
            updateTotal();
        });
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