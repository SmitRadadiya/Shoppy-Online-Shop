<!DOCTYPE html>
<?php
session_start();
ini_set('display_errors','off');
if(!isset($_SESSION['email'])){
  echo '<script type="text/javascript">';
  echo 'alert("Please Login first")';
  echo '</script>';
  header("refresh: 0.05; url = login.php");
}
?>

<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag ---------->

    <style>

  body {
    background: #F1F3FA;
  }

  /* Profile container */
  .profile {
    margin: 20px 0;
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
    background-size: cover;background-color:#ffddcc">
    <?php include 'navigationbar.php';
    include 'connection.php';
?>
<br>
<div>
    <div class="row profile">
			<div class="profile-sidebar" style="border-radius: 25px;background-color:#ffaa80;">
				<!-- SIDEBAR USERPIC -->
        <?php
        $id=31;

        $que=mysqli_query($conn,"select * from shopkeepers where sh_id='".$_SESSION['id']."'");
        $quee=mysqli_query($conn,"select * from shop where sh_id='".$_SESSION['id']."'");
        $rows1=mysqli_fetch_array($quee);

        while($rows=mysqli_fetch_array($que))
        {
        ?>
				<div class="profile-userpic">
					<img src="assets/images/<?php echo $rows1['img']; ?>" class="img-responsive" alt="Shop Image" style="width:150px ;height:150px;border-radius:50%">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
					<h2 style="color:#993300"><b> <?php echo $rows1['sh_nm']; ?> </b></h2>
					</div>
          <?php
          $dep=mysqli_query($conn,"SELECT * from dept WHERE dept_id=".$rows1['dept_id']);
          $depf=mysqli_fetch_array($dep);
           ?>
					<div class="text-info">
					    <h4> <b> <?php echo $depf['dept_nm']; ?> </b></h4>
					</div>
          <div class="text-info">
					    <h4><b><?php echo '<span class="glyphicon" style="margin:10px">&#xe183;</span>'.$rows['phone_num']; ?></b> </h4>
					</div>
          <div class="profile-usertitle-job">
					    <h4><b> <?php echo $rows1['addr'].', '.$rows1['pincode']; ?> </b></h4>
					</div>
				</div>
      <?php } ?>

				<div class="profile-usermenu">

        	<ul class="nav">
						<li>
							<a href="add.php">
						<h3 style="color:#993300">	&nbsp;&nbsp;<i class="glyphicon glyphicon-home" style="font-size: 24px"></i>
							My Address</h3> </a>
						</li>
						<li>
							<a href="account.php">
						<h3 style="color:#993300">	&nbsp;&nbsp;<i class="glyphicon glyphicon-user"  style="font-size: 24px"></i>
							My Account</h3> </a>
						</li>

						<li>
							<a href="contactus.php">
						<h3 style="color:#993300">	&nbsp;&nbsp;<i class="glyphicon glyphicon-flag"  style="font-size: 24px"></i>
							Help </h3></a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>


	</div>
</div>
<h3 align="center"> Version 2.1 </h3>


  </body>
</html>
