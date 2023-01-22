<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>

  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#e0e0eb">
    <br><br>
    <?php include 'header.php';
    include 'connection.php';
    ini_set("display_errors","off");

 ?>

      <?php

      $type=$_GET['type'];

      $type1=mysqli_query($conn,"SELECT * from customers WHERE c_mail = '".$_SESSION['email']."'");
      while($rows = mysqli_fetch_array($type1))
      {
        $c_pin=$rows['pincode'];
      }

      if(!$conn){
      die("connection failed:".mysqli_connect_error());
      }

      $que=mysqli_query($conn,"select * from shop where dept_id='$type' AND status='1' AND pincode='".$c_pin."'");

      while($rows = mysqli_fetch_array($que))
      {

        echo '<div class="main showcase-page">';
        echo '<div class="container" style="background-color:#e0e0eb;">';
        echo '<div class="row multi-columns-row">';
        echo '<div class="col-md-6 col-sm-6 col-xs-15">';

      ?>

        <a class="content-box" style="border-radius: 25px;" href="item.php?shop=<?php echo $rows['sh_id'];?>">
        <div class="content-box-image" style="height:70px;border-radius: 25px;background-color:#c1c1d7;">

        <img src="assets/images/<?php echo $rows['img']; ?>" alt="" height="200" width="100" align="left"><h3>


<?php

        echo $rows['sh_nm'];
        echo '</h3></div></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>


    </main>

</body>
</html>
