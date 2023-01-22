<?php
session_start();
 ?>
 <?php
 ini_set("display_errors","off");
 ?>

<html lang="en-US" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shoppy</title>

    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
    <style>
    .fnt{
      font-family: 'Roboto Condensed';}
    .fnt1{
      font-family: 'Roboto Condensed';
      font-size: 12px;
    }
    .tab{
      tab-size: 4;
    }
    </style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
     <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span></button>
              <a class="navbar-brand" href="index.php">sHOPPY</a>
            <a href="cart1.php"><img src="assets/images/cart.png" alt="" height="50" width="35" align="left" style="margin:7px;"></a>
          <a href="offer.php"><img src="assets/images/offer.png" alt="" height="50" width="35" align="right" style="margin:7px;"></a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown"><a href="index.php" class="fnt1">Home</a>
              </li>
              <li class=""><a href="profile1.php" class="fnt1">Profile</a>
              </li>
              <li class="dropdown"><a href="myorder.php" class="fnt1">My Order</a>
              </li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" class="fnt1">Categories</a>
                  <ul class="dropdown-menu">
                  <li><a href="getdata.php?type=4"class="fnt1">Dairy Product</a></li>
                  <li><a href="getdata.php?type=2"class="fnt1">Cosmetics</a></li>
                  <li><a href="getdata.php?type=3"class="fnt1">Medicals</a></li>
                  <li><a href="getdata.php?type=1"class="fnt1">Grocery</a></li>
                  <li><a href="getdata.php?type=7"class="fnt1">Mobile</a></li>
                  <li><a href="getdata.php?type=5"class="fnt1">Kitchen Appliances</a></li>
                  <li><a href="getdata.php?type=6"class="fnt1">Backery</a></li>

                </ul>
              <li class="dropdown"><a href="near.php"class="fnt1">Shops Near You</a>

              </li>
              <li class="dropdown"><a href="cart1.php"class="fnt1">Cart</a>
              </li>
            </li>
            <li class="dropdown"><a href="offer.php"class="fnt1">Offers</a>
            </li>

              <?php
              if(isset($_SESSION['email']))
              {
                  echo '<li class="dropdown fnt1"><a href="logout.php">Logout</a>';
              }
              else {
                echo '<li class="dropdown fnt1"><a href="login.php">Sign in</a>';
              }

              ?>
              </li>
              <li class="dropdown"><a href="Contactus.php"class="fnt1">Contact us</a>

              </li>
            </ul>
          </div>
          <div class="main showcase-page"></div>
      </div>
    </nav>
    <div class="scroll-up"><a href="#totop" style="border-radius:50px; display:inline-block; background-color:orange; height: 50px;width:50px"><i class="fa fa-arrow-up fa-2x" style="margin-top:10px; "></i></a></div>
  </main>
  <script src="assets/lib/jquery/dist/jquery.js"></script>
  <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/lib/wow/dist/wow.js"></script>
  <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
  <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
  <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
  <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
  <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="assets/lib/smoothscroll.js"></script>
  <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
  <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
  </body>
  </html>
