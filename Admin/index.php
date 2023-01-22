<?php
session_start();
ini_set('display_errors','off');

header("Refresh: 60");
if(!isset($_SESSION['pend'])){
  $_SESSION['pend'] = 0;
}

include 'navigationbar.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppy</title>
    <style>
        .txt {
          position: absolute;
          top: 8px;
          left: 0px;
          background: rgb(0, 0, 0); /* Fallback color */
          background: rgba(0, 0, 0, 0); /* Black background with 0.5 opacity */
          color: #f1f1f1;
          width: 100%;
          padding: 20px;
          text-align: left;
        }

    </style>
    <script>
      function play(soundObj) {
          var snd = new Audio("b.mp3");
          snd.play();
      }
</script>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#e0e0eb">
      <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <div class="main showcase-page" style="background-color:#e0e0eb;">
        <section class="module-medium" id="demos">
          <br>
          <?php
            $tot_profit = 0;
            $tot_rev = 0;


            $oid=mysqli_query($conn,"SELECT * FROM order_delivery ");
            while($oidf=mysqli_fetch_array($oid)){

                 $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id=".$oidf['o_id']);


                 $bal=0;
                 while($quef=mysqli_fetch_array($que)){

                   $str=mysqli_query($conn,"SELECT * from items where pl_id=".$quef['pl_id']." AND sh_id=".$quef['sh_id']);
                   while($strf=mysqli_fetch_array($str))
                   {
                     $bal+=$quef['quantity']*$strf['price'];
                   }
                 }
                 $delchrg=($bal*0.1)/2;
                 $profit=$oidf['eff_price']-$bal-$delchrg;
                 $tot_profit +=  $profit;

                 $rev = $oidf['eff_price'];
                 $tot_rev += $rev;
               }
                 ?>

        <?php
          $daytot = 0;
          date_default_timezone_set('Asia/Kolkata');
          $day = date('w');
          $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
          $week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
          $today_date = date('Y-m-d',strtotime("now"));
          //$str="select * from balance where dt='".$today_date."' AND sh_id='".$_SESSION['id'];
          $res=mysqli_query($conn,"SELECT * from balance where sh_id=".$_SESSION['id']);

          while($ans=mysqli_fetch_array($res))
          {
            //$time = date('Y-m-d',strtotime($ans['dt']);
            if(date('Y-m-d',strtotime($ans['dt']))==$today_date){
            $daytot += $ans['curr_bal'];
            $comm+=$ans['comm'];
          }}
        ?>
        <?php
        $profit = 0;


        $delid=mysqli_query($conn,"SELECT * from delivery");
        $oidf=mysqli_fetch_array($oid);

        while($delidf=mysqli_fetch_array($delid)){
             $oid=mysqli_query($conn,"SELECT * FROM del_hist where d_id=".$delidf['d_id']." AND o_status='complete'");
             while($oidf=mysqli_fetch_array($oid)){

             $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id=".$oidf['o_id']);


             $bal=0;
             while($quef=mysqli_fetch_array($que)){

               $str=mysqli_query($conn,"SELECT * from items where pl_id=".$quef['pl_id']." AND sh_id=".$quef['sh_id']);
               while($strf=mysqli_fetch_array($str))
               {
                 $bal+=$quef['quantity']*$strf['price'];
               }
             }
             $delchrg=($bal*0.1)/2;
             $profit+=$delchrg;
           }}
        ?>
          <br>
          <div class="container" style="background-color:#e0e0eb;">
            <div class="row multi-columns-row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a class="" style="margin-bottom: 0px; margin: 5px 0;" href="admi.php">
                <div align="left" margin="10px" height="33.33%" spacing="10px">
                  <div class="content-box-image" style="height:130px;  position: relative; text-align: center; background-color:green ;border-radius: 25px;">
                    <h3>
                      <div class="txt"><b>Admin :<?php
                      if(!isset($_SESSION['id'])){
                        echo "₹0";
                      }else {
                        echo ' ₹'.$tot_profit;}
                        ?><br>

                        <table >
                          <tr>

                          </tr>
                        </table>
                        </b>
                      </div></h3>
                  <h3><?php  ?></h3>
                  </div>
                </div>
              </div>
               <?php
               $day = date('w');
               $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
               $week_end = date('Y-m-d', strtotime('+'.(7-$day).' days'));

               $str1="select * from balance where dt>='".$week_start."' AND dt<'".$week_end."'";

               $result1=mysqli_query($conn,$str1);
               $weektotal=0;
               while($rows1 = mysqli_fetch_array($result1))
               {
                 $weektotal += $rows1['curr_bal'];
               }
              ?>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a class="" style="margin-bottom: 0px; margin: 5px 0;" href="sk.php">
                <div align="left" margin="10px" height="33.33%" spacing="10px">
                  <div class="content-box-image" style="height:130px;border-radius: 25px; background-color:lightpink ;">
                    <h3>
                      <div class="txt"><b>
                            &nbsp;&nbsp;Shopkeeper : <?php echo ' ₹'.$weektotal; ?></b>

                      </div></h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a class="" style="margin-bottom: 0px; margin: 5px 0;" href="del.php">
                <div align="left" margin="10px" height="33.33%" spacing="10px">
                  <div class="content-box-image" style="height:130px;border-radius: 25px; background-color:skyblue ;">
                    <h3>
                      <div class="txt"><b>
                            &nbsp;&nbsp;Delivery : <?php echo ' ₹'.$profit; ?></b>

                      </div></h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a class="" style="margin-bottom: 0px; margin: 5px 0;" href="cus.php">
                <div align="left" margin="10px" height="33.33%" spacing="10px">
                  <div class="content-box-image" style="height:130px;border-radius: 25px; background-color:gray ;">
                    <h3>
                      <div class="txt"><b>
                            &nbsp;&nbsp;Customer : <?php echo ' ₹'.$tot_rev; ?></b>

                      </div></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
   </body>
</html>
