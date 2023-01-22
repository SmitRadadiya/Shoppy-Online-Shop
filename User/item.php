
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <?php include 'header.php';
    include 'connection.php';
    ini_set("display_errors","off");

?>
  </head>
<style>

#marg
{
  margin-right: 10px;
  margin-left: 14px;
}
  </style>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#e0e0eb;">

  <div style="margin-top:100px;">

      <?php
      $sh_id=$_GET['shop'];


      if(!$conn){
      die("connection failed:".mysqli_connect_error());
      }

      $que=mysqli_query($conn,"select * from items where sh_id='$sh_id' AND stock>='1'");

      while($rows = mysqli_fetch_array($que))
      {
        echo '<div class="main showcase-page">';
        echo '<div class="container" style="background-color:#e0e0eb;">';
       // echo '<div class="row multi-columns-row">';
        echo '<div class="col-md-6 col-sm-6 col-xs-6">';

        $q1=mysqli_query($conn, "select * from prod_list where ".$rows['pl_id']."=pl_id");
        $q1_data=mysqli_fetch_array($q1);

        ?>

        <div class="content-box" style="margin-left:-20px;">
        <div class="content-box-image " style="height:250px; width:370px;border-radius: 25px;background-color:#c1c1d7;">
        <table><th>
        <img src="assets/images/<?php echo $q1_data['pl_img']; ?>" alt="" height="160" width="180" align="left">
        </th>
        <br>
        <th id="marg">
          <td>
        <?php
        echo '<h4 class="text-info">';
        echo $q1_data['pl_nm'];
        echo '<br>';
        echo $q1_data['descr'];
        echo '</h4>';
        echo '<h4 class="text-danger">';
        echo '₹';
        $add = $rows['price'] + $rows['price']*0.1;
        echo round($add);
        echo '</h4>';
        echo '<br>';
        echo '<h4>';
        echo '<a href="pre_order.php?shop='.$sh_id.'&itemName='.$q1_data['pl_nm'].'&price='.$rows['price'].'"><button type="button" class="btn btn-info " id="btn"  style="font-size:16px"><b>Add to Cart</b></button></a>';

        echo '</h4>';
        echo '<td></th></table>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>

    </div>


  </body>
</html>
