<!DOCTYPE html>
<?php
session_start();
ini_set("display_errors","off");
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
<br>
<?php
    $id=$_SESSION['email'];
    $que=mysqli_query($conn,"select * from customers where c_mail='$id'");
    $rows=mysqli_fetch_array($que);
?>
<form action="update_add.php" method="POST">
<div class="content-box">
<div class="content-box-image" style="border-radius: 25px;background-color:#c1c1d7;margin:20px" align="left">
   <br>
   <i class="glyphicon glyphicon-home" style="font-size:30px; margin-left:15px; padding:10px"> <b>Home</b> </i>
   <h4 style="margin-left:75px; font-size:18px;">
     <div class="p-t-31 p-b-9">
      <span class="txt1 fnt">
       <?php echo '<br><b>Address :</b>';?>
       <input type="text" name="addrss" style="border-radius: 10px;background-color:#e0e0eb;border:none;" value=" <?php echo $rows['u_addr']; ?>">
      </span>
      </div>
      <div class="p-t-31 p-b-9">
       <span class="txt1 fnt">
        <?php echo '<br><b>Pincode :</b>';?>
        <input type="text" name="pincode" style="border-radius: 10px;background-color:#e0e0eb;border:none;" value=" <?php echo $rows['pincode']; ?>">
       </span>
      </div>
    </i></h4>
    <br><br>
    <h4 style="color:black;" align="center">
    <input type="submit" name="submit" value="Update" style="border-radius: 8px;background-color:black;border:none;color:white">
</div>
</div>
</form>
</div>


  </body>
</html>
