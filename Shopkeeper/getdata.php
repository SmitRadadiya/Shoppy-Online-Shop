<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <?php include 'navigationbar.php';
    include 'connection.php';
 ?>

      <?php

      $type=$_GET['type'];

      if(!$conn){
      die("connection failed:".mysqli_connect_error());
      }

      $que="SELECT * from balance where DAYOFYEAR(date)=DAYOFYEAR(NOW());"

      while($rows = mysqli_fetch_array($que))
      {
        echo '<div class="main showcase-page">';
      ?>

        <a class="content-box" href=".php?sh_id=<?php echo $rows['sh_id'];?>">
        <div class="content-box-image" style="height:70px">

        <img src="assets/images/<?php echo $rows['img']; ?>" alt="" height="200" width="100" align="left"><h3>

<?php

        echo $rows['sh_nm'];
        echo '</h3></div>';
        echo '</div>';
        echo '</div>';
      }
      ?>
