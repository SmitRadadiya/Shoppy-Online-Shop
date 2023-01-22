<?php session_start();
ini_set("display_errors","OFF");
      ?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;background-color:#ffddcc">
<?php include 'navigationbar.php';
include 'connection.php';
 ?>
<div class="main showcase-page" style="background-color:#ffddcc;">
<h4><br><br><br>
  <?php

      $add=mysqli_query($conn,"SELECT * from shopkeepers where sh_id=".$_SESSION['id']);
      $addf=mysqli_fetch_array($add);
  ?>
<form class="w3-container" action="update_acc.php" method="POST">
  <p>
  <span class="glyphicon" style="margin:10px;">&#xe008;</span>
  <label>First Name</label>
  <input class="w3-input" type="text" name="fnm" style="border-radius: 25px;background-color:#ffaa80;" value="<?php echo $addf['s_nm']; ?>"></p>

  <p>
  <span class="glyphicon" style="margin:10px">&#x2709;</span>
  <label>Email</label>
  <input class="w3-input" type="text" name="email" style="border-radius: 25px;background-color:#ffaa80;" value="<?php echo $addf['s_mail']; ?>"></p>

  <p>
    <span class="glyphicon" style="margin:10px">&#xe136;</span>
  <label>Password</label>
  <input class="w3-input" type="password" name="pwd" style="border-radius: 25px;background-color:#ffaa80;" value="<?php echo $addf['s_pwd']; ?>"></p>
  <p>
    <span class="glyphicon" style="margin:10px">&#xe183;</span>
  <label>Mobile No.</label>
  <input class="w3-input" type="number" name="num" style="border-radius: 25px;background-color:#ffaa80;" value="<?php echo $addf['phone_num']; ?>"></p>
  <p align="center">
    <!-- <button class="btn btn-lg btn-block btn-round btn-d" name="submit" type="submit">Update</button> -->
    <input type="submit" name="submit" value="Update" class="btn btn-lg btn-block btn-round btn-d">
</p>
</form>

</body>
</html>
