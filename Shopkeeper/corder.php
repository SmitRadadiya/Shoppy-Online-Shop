<html lang="en-US" dir="ltr">
<?php
include 'navigationbar.php';
include 'connection.php';
if(!isset($_SESSION['email'])){
  echo '<script type="text/javascript">';
  echo 'alert("Please Login first")';
  echo '</script>';
  header("refresh: 0.05; url = login.php");
}

?>

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
    background-size: cover;background-color:#ffddcc">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>

      <div class="main showcase-page" style="background-color:#ffddcc;"><br><br>
        <h3><b>&nbsp;&nbsp;&nbsp;&nbsp;Completed Order :</b></h3>
              <?php
                  $que=mysqli_query($conn,"SELECT * from order_shopkeeper");
                  ?>
                  <?php
                  $o_id=mysqli_query($conn,"SELECT * from order_delivery  ORDER BY o_id DESC");
                      while($o_idf=mysqli_fetch_array($o_id)){
                      ?>
                      <?php
                      while($sql=mysqli_fetch_array($que) ANd $o_idf['o_id']==$sql['id']){ }
                      $ped = mysqli_query($conn,"SELECT * from order_shopkeeper where id='".$o_idf['o_id']."' AND sh_id='".$_SESSION['id']."'");
                      $pedf = mysqli_fetch_array($ped);
                      if($pedf['status']=="complete" || $pedf['status']=="cancel" ||  $pedf['status']=="refunded"){
                       ?>
        <section class="module-medium" id="demos">
          <div class="container">
            <div class="row multi-columns-row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a class="content-box" style="margin-bottom: 0px; margin: 0px 0;" href="corder_table.php?o_id=<?php echo $o_idf['o_id']; ?> ">
                <div align="left" margin="10px" height="33.33%" spacing="10px">
                  <div class="content-box-image" style="height:220px;border-radius: 25px;background-color:#ffaa80;">
                    <h3>
                        <table style="color:#000;">
                          <tr>
                            <td><h4 style="margin-left:10px">Order ID:</h4></td><td>
                          <?php
                            echo $o_idf['o_id'];
                          ?></td>
                          </tr>
                          <tr>
                              <td><h4 style="margin-left:10px">Date :</h4></td>
                              <td><h4><?php
                              echo $pedf['order_date'];
                              ?></h4></td>
                            </tr>
                            <tr>
                              <td><h4 style="margin-left:10px">OTP :</h4></td><td>
                            <?php
                              echo $pedf['s_otp'];
                            ?></td>
                            </tr>
                            <tr>
                              <td><h4 style="margin-left:10px">Status :</h4></td><td>
                                <?php
                                  echo $pedf['status'];
                                ?></td>
                            </tr>
                          </table>
                  </h3>
                  </div>
                </div></a>
              </div>
<?php
if($pedf['status']=="cancel")
{
            echo  '<form align="center" action="refund_proceed.php?o_id='.$o_idf['o_id'].'" method="POST">';
            echo '<h4><b><input type=submit name="refund" value="Return" style="align:center; border-radius:10px; width: 100px; height:50px; background-color:green; color:black"><b></h4>';
            echo  '</form>';
              }
?>
            </div>
          </div>
        </section>
      <?php }} ?>
      </div>
    </main>
  </body>
</html>
