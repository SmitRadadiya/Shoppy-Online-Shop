<?php

session_start();
ini_set("display_errors","off");

 ?>

<?php

if(!isset($_SESSION['email']))
{
  echo '<script type="text/javascript">';
  echo ' alert("Please login first...")';
  echo '</script>';
  header("refresh: 0.5; url = login.php");

}
 ?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen">
      .td{
        margin-bottom: 0px;
        margin-left: : 15px;
      }
      table {
        width: 100%;
      }
      td, th {
        text-align: left;
        padding-left: 8px;
      }
    </style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#e0e0eb">
    <?php include 'header.php';
    include 'connection.php';
?>  <main>

        <div class="main showcase-page" style="background-color:#e0e0eb;"><br><br>
          <h3><b>&nbsp;&nbsp;&nbsp;&nbsp;My Order :</b></h3>
                <?php
                    $que=mysqli_query($conn,"SELECT * from order_shopkeeper");
                    ?>
                    <?php
                    $o_id=mysqli_query($conn,"SELECT * from order_delivery order by o_id DESC");
                        while($o_idf=mysqli_fetch_array($o_id)){
                        ?>
                        <?php
                        while($sql=mysqli_fetch_array($que) AND $o_idf['o_id']==$sql['id']){ }
                        $ped = mysqli_query($conn,"SELECT * from order_shopkeeper where id='".$o_idf['o_id']."' AND c_id='".$_SESSION['id']."'");
                        $pedf = mysqli_fetch_array($ped);
                        $hist=mysqli_query($conn,"SELECT o_status from del_hist where o_id='".$o_idf['o_id']."'");
                        $histf=mysqli_fetch_array($hist);

                        if($histf['o_status']=="pending" || $histf['o_status']=="on the way" || $histf['o_status']=="cancel"){
                        ?>
          <!-- <section class="module-medium" id="demos"> -->
            <div class="container" style="background-color:#e0e0eb;">
              <div class="row multi-columns-row">
                <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" style="margin-bottom: 0px; margin: 0px ;" href="myorder_table.php?o_id=<?php echo $o_idf['o_id']; ?> ">
                  <div align="left" margin="10px" height="33.33%">
                    <div class="content-box-image" style="height:200px;border-radius: 25px;background-color:#c1c1d7;">
                      <h4>
                          <table>
                            <tr>
                              <td><h4>&nbsp;&nbsp;Order ID:</h4></td><td>
                              <?php
                              echo $o_idf['o_id'];?>
                              </td>
                            </tr>
                            <tr>
                              <td><h4>&nbsp;&nbsp;Status:</h4></td><td>
                              <?php
                                echo $histf['o_status'];
                              ?>
                              </td>
                            </tr>
                              <tr>
                                <td><h4>&nbsp;&nbsp;Date :</h4></td>
                                <td><h4><?php
                                echo $pedf['order_date'];
                                ?></h4></td>
                              </tr>
                              <tr>
                                <td><h4>&nbsp;&nbsp;OTP :</h4></td>
                                <td><h4><?php
                                  echo $o_idf['c_otp'];
                                ?></h4></td>
                              </tr>
                          </table>
                    </h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- </section> -->
        <?php }
        if($histf['o_status']=="complete"){
         ?>
          <!-- <section class="module-medium" id="demos"> -->
          <div class="container" style="background-color:#e0e0eb;">
          <div class="row multi-columns-row">
          <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" style="margin-bottom: 0px; margin: 0px ;" href="myorder_table.php?o_id=<?php echo $o_idf['o_id']; ?> ">
            <div align="left" margin="10px" height="33.33%">
              <div class="content-box-image" style="height:200px;border-radius: 25px;background-color:#c1c1d7;">
                <h4>
                    <table>
                      <tr>
                        <td><h4>&nbsp;&nbsp;Order ID:</h4></td><td>
                        <?php
                        echo $o_idf['o_id'];?>
                        </td>
                      </tr>
                      <tr>
                        <td><h4>&nbsp;&nbsp;Status:</h4></td><td>
                        <?php
                          echo $histf['o_status'];
                        ?>
                        </td>
                      </tr>
                        <tr>
                          <td><h4>&nbsp;&nbsp;Date :</h4></td>
                          <td><h4><?php
                          echo $pedf['order_date'];
                          ?></h4></td>
                        </tr>
                        <tr>
                          <td><h4>&nbsp;&nbsp;OTP :</h4></td>
                          <td><h4><?php
                            echo $o_idf['c_otp'];
                          ?></h4></td>
                        </tr>
                    </table>
              </h4>
              </div>
            </div>
          </div>
          </div>
          </div>
          <!-- </section> -->
          <?php }
      } ?>
        </div>
      </main>



  </body>
</html>
