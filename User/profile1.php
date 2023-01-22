<!DOCTYPE html>
<?php
session_start();
 ?>
 <?php
 ini_set("display_errors","off");

 if(!isset($_SESSION['email']))
 {
   echo '<script type="text/javascript">';
   echo ' alert("Please login first...")';
   echo '</script>';
   header("refresh: 0.5; url = login.php");

 }

 ?>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
    Document Title
    =============================================
    -->
    <title>Shoppy</title>
    <!--
    Favicons
    =============================================
    -->
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
    <!--
    Stylesheets
    =============================================

    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
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
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag ---------->

<meta name='viewport' content='width=device-width, initial-scale=1'>


    <style>

  body {
    background: #F1F3FA;
  }

  /* Profile container */
  .profile {
    margin: 20px 0;
  }
  .Division{
   float: left;
    width: 200px;
    height: 200px;
    border: 2px solid #000000;
    margin-left: 10px;
}

  /* Profile sidebar */
  .profile-sidebar {
    padding: 20px 0 10px 0;
    background: #fff;
  }

  .profile-userpic img {
    float: none;
    margin: 0 auto;
    width: 50%;
    height: 50%;
    -webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    border-radius: 50% !important;
  }

  .profile-usertitle {
    text-align: center;
    margin-top: 20px;
  }

  .profile-usertitle-name {
    color: #5a7391;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 7px;
  }

  .profile-usertitle-job {
    text-transform: uppercase;
    color: #5b9bd1;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 15px;
  }

  .profile-userbuttons {
    text-align: center;
    margin-top: 10px;
  }

  .profile-userbuttons .btn {
    text-transform: uppercase;
    font-size: 11px;
    font-weight: 600;
    padding: 6px 15px;
    margin-right: 5px;
  }

  .profile-userbuttons .btn:last-child {
    margin-right: 0px;
  }

  .profile-usermenu {
    margin-top: 30px;
  }

  .profile-usermenu ul li {
    border-bottom: 1px solid #f0f4f7;
  }

  .profile-usermenu ul li:last-child {
    border-bottom: none;
  }

  .profile-usermenu ul li a {
    color: #93a3b5;
    font-size: 14px;
    font-weight: 400;
  }

  .profile-usermenu ul li a i {
    margin-right: 8px;
    font-size: 14px;
  }

  .profile-usermenu ul li a:hover {
    background-color: #fafcfd;
    color: #5b9bd1;
  }

  .profile-usermenu ul li.active {
    border-bottom: none;
  }

  .profile-usermenu ul li.active a {
    color: #5b9bd1;
    background-color: #f6f9fb;
    border-left: 2px solid #5b9bd1;
    margin-left: -2px;
  }

  /* Profile Content */
  .profile-content {
    padding: 20px;
    background: #fff;
    min-height: 460px;
  }
</style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#e0e0eb">
    <?php include 'header.php';
    include 'connection.php';
?>
<div>
    <div class="row profile">
			<div class="profile-sidebar" style="border-radius: 25px;background-color:#c1c1d7;">
				<!-- SIDEBAR USERPIC -->
        <?php
        $id=$_SESSION['email'];

        $que=mysqli_query($conn,"select * from customers where c_mail='$id'");


        $rows=mysqli_fetch_array($que)

        ?>
				<div class="profile-userpic"><br>
					<img src="assets/images/<?php echo $rows['c_img']; ?>" class="img-responsive" alt="" style="width:150px ;height:150px;border-radius:50%">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
					<h2 style="color:#3c3c5d"> <b><?php echo $rows['c_nm']; ?> </b></h2>
					</div>
					<div class="text-info">
					    <h4> <b> <?php echo '<span class="glyphicon" style="margin:10px">&#x2709;</span>'.$rows['c_mail']; ?> </b></h4>
					</div>
          <div class="profile-usertitle-job">
					    <h4> <b><?php  echo '<span class="glyphicon" style="margin:10px">&#xe183;</span>'.$rows['c_phone_num']; ?> </b></h4>
					</div>
				</div>


				<div class="profile-usermenu">

        	<ul class="nav">
						<li>
							<a href="add.php">
						<h3 style="color:#3c3c5d">	&nbsp;&nbsp;<i class="glyphicon glyphicon-home" style="font-size: 24px"></i>
							My Address</h3> </a>
						</li>


            <li>
							<a href="user_wallet.php">
						<h3 style="color:#3c3c5d">	&nbsp;&nbsp;<i class="glyphicon glyphicon-credit-card" style="font-size: 24px"></i>
                My Wallet: &nbsp; &#8377;<?php echo $rows['wallet']; ?>
              </h3>
             </a>
						</li>

						<li>
							<a href="account.php">
						<h3 style="color:#3c3c5d">	&nbsp;&nbsp;<i class="glyphicon glyphicon-user"  style="font-size: 24px"></i>
							Account Settings</h3> </a>
						</li>

						<li>
							<a href="contactus.php">
						<h3 style="color:#3c3c5d">	&nbsp;&nbsp;<i class="glyphicon glyphicon-flag"  style="font-size: 24px"></i>
							Help </h3></a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>


	</div>
</div>
<h3 align="center"> Version 2.1 </h3>

    <!--
    JavaScripts
    =============================================
    -->
  

  </body>
</html>
