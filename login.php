<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Portal</title>
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link rel='icon' href='resource/img/ceu.png' type='image/x-icon' sizes="16x16" />
  <link rel="stylesheet" type="text/css"  href="resource/css/login.css">
  <style>
  body {
  background-image:linear-gradient(rgba(234, 167, 201, .9), rgba(34, 31, 112, .9)),url(./resource/img/bg.jpg);
  background-position:center;
  background-size: cover;
  background-repeat:no-repeat;
  min-height: 100vh;
  font-family: "Asap", sans-serif;
  }
  </style>
</head>
<body>
  <div class="loader-container">
        <div class="loader-logo"></div>
        <div class="loader-bar">
            <div class="progress"></div>
        </div>
        <div class="loader-text">Loading 0%</div>
    </div>
         <nav class="navbar navbar-light bg-dark bnav shadow ">
          <a class="p-5" href="https://malolos.ceu.edu.ph/">
            <img class="mdb" src="resource/img/corp.png" height="65" left="0" alt="mdb logo">
          </a>
        </nav>

              <form class="login" action="" method="post">
                <?php logd();?>
                <h4>ORD Login</h4>
                <input type="text" placeholder="Username"  id="username"  name="username" required>
                <input type="password" placeholder="Password" name ="password" required>
                <input type =hidden name="token" value="<?php echo Token::generate(); ?>">
                <input type="submit" style="display: none;" id="hiddenSubmitButton">
              <button onclick="document.getElementById('hiddenSubmitButton').click()" >Login</button>
            </form>
            <footer class="bfooter text-light p-3">
                <p class="ftext text-center">© 2023 Copyright <b>Centro Escolar University , Office of University Registrar</b>.  Developed by <b>Reymart Bolasoc (reymart.bolasoc@gmail.com) </b> & <b>Jerrick Anatalio (jganatalio@ceu.edu.ph)</b> </p>
            </footer>
        <script src="vendor/js/jquery.js"></script>
        <script src="vendor/js/popper.js"></script>
        <script src="vendor/js/bootstrap.min.js"></script>
        <script src="resource/js/loader.js"></script>
    </body>
    </html>
