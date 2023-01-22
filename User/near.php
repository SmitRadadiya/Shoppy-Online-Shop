<?php session_start();
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
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#e0e0eb">    <br><br><br>
    <?php include 'header.php';
    include 'connection.php';
?>

      <?php


      $type=mysqli_query($conn,"SELECT * from customers WHERE c_mail = '".$_SESSION['email']."'");
      while($rows = mysqli_fetch_array($type))
      {
        $c_pin=$rows['pincode'];
      }

      if(!$conn){
      die("connection failed:".mysqli_connect_error());
      }
      $sql= "select * from shop where pincode='".$c_pin."' AND status='1'";
      //echo $sql;
      $que=mysqli_query($conn,$sql);

      while($rows = mysqli_fetch_array($que))
      {

        echo '<div class="main showcase-page" >';
        echo '<div class="container" style="background-color:#e0e0eb;">';

      ?>

        <a class="content-box" href="item.php?shop=<?php echo $rows['sh_id'];?>">
        <div class="content-box-image" style="height: ;width: ;border-radius: 25px;background-color:#c1c1d7;">

        <img src="assets/images/<?php echo $rows['img']; ?>" alt="" height="200" width="100" align="left"><h3>

<?php

        echo $rows['sh_nm'];
        echo '</h3></div></a>';
        echo '</div>';
        echo '</div>';

      }
      ?>
    </main>

  </body>
</html>
