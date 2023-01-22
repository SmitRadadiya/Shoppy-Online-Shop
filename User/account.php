<!DOCTYPE html>
<?php
session_start();
ini_set("display_errors","off");

 ?>
<html>
<title>Shoppy</title>
<head>
  <style media="screen">
  .profile-userpic img {
    float: none;
    margin: 0 auto;
    width: 50%;
    height: 50%;
    -webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    border-radius: 50% !important;
  }
  [type="file"] {
  height: 0;
  overflow: hidden;
  width: 0;
}

[type="file"] + label {
  background: #f15d22;
  border: none;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  display: inline-block;
	font-family: 'Rubik', sans-serif;
	font-size: inherit;
  font-weight: 500;
  margin-bottom: 1rem;
  outline: none;
  padding: 1rem 50px;
  position: relative;
  transition: all 0.3s;
  vertical-align: middle;

  &:hover {
    background-color: darken(#f15d22, 10%);
  }
  &.btn-2 {
    background-color: #99c793;
    border-radius: 50px;
    overflow: hidden;

    &::before {
      color: #fff;
      content: "\f382";
      font-family: "Font Awesome 5 Pro";
      font-size: 100%;
      height: 100%;
      right: 130%;
      line-height: 3.3;
      position: absolute;
      top: 0px;
      transition: all 0.3s;
    }

    &:hover {
      background-color: darken(#99c793, 30%);

      &::before {
        right: 75%;
      }
    }
  }

  .cbtn{
    float: none;
    margin: 0 auto;
    width: 50%;
    height: 50%;
  }
  </style>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;background-color:#e0e0eb;"><br><br>
  <?php include 'header.php';
      include 'connection.php';
?>
<div class="main showcase-page" style="background-color:#e0e0eb;">
  <?php
  $que=mysqli_query($conn,"select * from customers where c_id=".$_SESSION['id']);

  while($rows=mysqli_fetch_array($que))
  {
  ?>
<h4>
<form class="w3-container" action="update_acc.php" method="POST" enctype="multipart/form-data">
  <div class="profile-userpic"><br>
    <img src="assets/images/<?php echo $rows['c_img']; ?>" class="img-responsive" alt="" style="width:150px ;height:150px;border-radius:50%">
  </div>
  <h6>
  <div class="cbtn" style="margin-left: 24%;">
    <div class="wrap-input100 validate-input">
      <input type="file" name="fileToUpload" id="fileToUpload" />
      <label for="fileToUpload" class="btn-2" style="background-color:black;color:white">Change Photo</label>
      <!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
      <span class="focus-input100"></span>
    </div>
  </div></h6>
  <p>
  <span class="glyphicon" style="margin:10px">&#xe008;</span>
  <label> Name</label>
  <input class="w3-input" type="text" name="c_nm" style="border-radius: 10px;background-color:#c1c1d7;border:none;" value="<?php echo $rows['c_nm']; ?>"></p>

  <p>
  <span class="glyphicon" style="margin:10px">&#x2709;</span>
  <label>Email</label>
  <input class="w3-input" type="text" name="c_mail" style="border-radius: 10px;background-color:#c1c1d7;border:none;" value="<?php echo $rows['c_mail']; ?>"></p>

  <p>
  <span class="glyphicon" style="margin:10px">&#xe136;</span>
  <label>Password</label>
  <input class="w3-input" type="password" name="c_pwd" style="border-radius: 10px;background-color:#c1c1d7;border:none;" value="<?php echo $rows['c_pwd']; ?>"></p>
  <p>
    <span class="glyphicon" style="margin:10px">&#xe183;</span>
  <label>Mobile No.</label>
  <input class="w3-input" type="number" name="c_phone_num" style="border-radius: 10px;background-color:#c1c1d7;border:none;" value="<?php echo $rows['c_phone_num']; ?>"></p>
  <p align="center">
    <input type="submit" name="submit" value="Update" style="border-radius: 8px;background-color:black;border:none;" class="btn btn-lg btn-block btn-round btn-d">
</p>
</form>
<?php } ?>
</body>
</html>
