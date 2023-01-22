  <?php
session_start();
header("Refresh: 60");
if(!isset($_SESSION['email'])){
  echo '<script type="text/javascript">';
  echo 'alert("Please Login first")';
  echo '</script>';
  header("refresh: 0.05; url = login.php");
}

?>

<?php
include 'connection.php';
ini_set('display_errors','off');

// $refund=0;
// $o_iid=$_GET['o_iddd'];
//
// $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id='$o_idd' AND sh_id='".$_SESSION['id']."'");
// $quef=mysqli_fetch_array($que);
//
// $did=mysqli_query($conn,"SELECT * from del_hist where o_id=".$o_iid);
// $didf=mysqli_fetch_array($did);
// echo $didf['d_id'];
//
// if(isset($_POST['cancel'])){
//   echo $o_iid."jaja have";
//   mysqli_query($conn,"UPDATE order_shopkeeper SET status='cancel' WHERE id=".$o_iid." AND sh_id='".$_SESSION['id']."'");
//   $str=mysqli_query($conn,"SELECT * from items where pl_id=".$quef['pl_id']." AND sh_id=".$_SESSION['id']);
//
//   while($prc=mysqli_fetch_array($str)){
//     $refund+=round($prc['price']*0.1)*$quef['quantity'];
//     echo $refund;
//   }
//
// echo $refund;
// $refund+=$depof['depo_avail'];
// echo "haha".$refund;
// mysqli_query($conn,"UPDATE set_del SET depo_avail=".$refund." where d_id=".$didf['d_id']);
// mysqli_query($conn,"UPDATE set_del SET d_status=1 where d_id=".$didf['d_id']);
// }

if(1){
  $o_iid=$_GET['o_iddd'];

  mysqli_query($conn,"UPDATE order_shopkeeper SET status='Order Prepared' WHERE id='".$o_iid."' AND sh_id='".$_SESSION['id']."'");
  $que=mysqli_query($conn,"SELECT * from order_shopkeeper where sh_id=".$_SESSION['id']." AND id='".$o_iid."'");

  while($quef=mysqli_fetch_array($que)){
    $bal=0;
    $str=mysqli_query($conn,"SELECT * from items where pl_id=".$quef['pl_id']." AND sh_id=".$_SESSION['id']);
    while($strf=mysqli_fetch_array($str))
    {
      $bal+=$quef['quantity']*$strf['price'];
      $max_str="SELECT max(b_id) FROM balance";
      $id=mysqli_query($conn,$max_str);
      while ($idf=mysqli_fetch_array($id)) {
      $abs=$idf[0]+1;
      }
      if(isset($_POST['submit'])){
      $str1="INSERT INTO `balance` (`b_id`, `sh_id`, `curr_bal`,`o_id`) VALUES (".$abs.",".$_SESSION['id'].",".$bal.",".$o_iid.")";
      $que1=mysqli_query($conn,$str1);
    }
  }
}
}
 ?>
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
    background-size: cover;background-color:#ffddcc">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <?php include 'navigationbar.php' ?>
      <div class="main showcase-page" style="background-color:#ffddcc;"><br><br>
        <h3><b>&nbsp;&nbsp;&nbsp;&nbsp;Today's Order :</b></h3>
              <?php
                  $conn=mysqli_connect("localhost","root","","shoppy");
                  $que=mysqli_query($conn,"SELECT * from order_shopkeeper");

                  $o_id=mysqli_query($conn,"SELECT * from order_delivery");
                  $ped = mysqli_query($conn,"SELECT * from order_shopkeeper where sh_id=".$_SESSION['id']." AND (status='pending' OR status='Order Prepared')");
                  $pedff = mysqli_fetch_array($ped);
                  if($pedff['status']=="pending" || $pedff['status']=="Order Prepared"){
                      while($o_idf=mysqli_fetch_array($o_id)){
                      ?>
                      <?php

                      while($sql=mysqli_fetch_array($que) AND $o_idf['o_id']==$sql['id']){ }
                      $ped = mysqli_query($conn,"SELECT * from order_shopkeeper where id='".$o_idf['o_id']."' AND sh_id='".$_SESSION['id']."'");
                      $pedf = mysqli_fetch_array($ped);

                      if($pedf['status']=="pending" || $pedf['status']=="Order Prepared"){
                       ?>
        <section class="module-medium" id="demos">
          <div class="container">
            <div class="row multi-columns-row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a class="content-box" style="margin-bottom: 0px; margin: 5px 0;" href="currentorder_table.php?o_id=<?php echo $o_idf['o_id']; ?> ">
                <div align="left" margin="10px" height="33.33%" spacing="10px">
                  <div class="content-box-image" style="height:170px;border-radius: 25px;background-color:#ffaa80;">
                    <h3>
                        <table>
                          <tr>
                            <td><h4 style="margin-left:20px;color:#595959;">Order ID:</h4></td><td>
                          <?php
                            echo $o_idf['o_id'];
                          ?></td></tr>
                            <tr>
                              <td><h4 style="margin-left:20px;color:#595959;">OTP :</h4></td>
                              <td><h4><?php
                                echo $pedf['s_otp'];
                              ?></h4></td>
                            </tr>
                            <tr>
                              <td><h4 style="margin-left:20px;color:#595959;">OTP :</h4></td>
                              <td><h4><?php
                                echo $pedf['status'];
                              ?></h4></td>
                            </tr>
                          </table>
                  </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php }}}
      else {
        echo '<br><h4 align="center"><b style="color:#ff884d;">'."NO PENDING ORDER";
      }?>

      </div>
    </main>
  </body>
</html>
