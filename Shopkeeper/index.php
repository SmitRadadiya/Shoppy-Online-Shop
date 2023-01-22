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
        .onoffswitch {
         position: relative; width: 113px;
         -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
        }
        .onoffswitch-checkbox {
         display: none;
        }
        .onoffswitch-label {
         display: block; overflow: hidden; cursor: pointer;
         border: 2px solid #999999; border-radius: 50px;
        }
        .onoffswitch-inner {
         display: block; width: 200%; margin-left: -100%;
         transition: margin 0.3s ease-in 0s;
        }
        .onoffswitch-inner:before, .onoffswitch-inner:after {
         display: block; float: left; width: 50%; height: 32px; padding: 0; line-height: 32px;
         font-size: 17px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
         box-sizing: border-box;
        }
        .onoffswitch-inner:before {
         content: "ON";
         padding-left: 14px;
         background-color: #21EB32; color: #FFFFFF;
        }
        .onoffswitch-inner:after {
         content: "OFF";
         padding-right: 14px;
         background-color: #F70808; color: #FCFCFC;
         text-align: right;
        }
        .onoffswitch-switch {
         display: block; width: 40px; margin: -4px;
         background: #FFFFFF;
         position: absolute; top: 0; bottom: 0;
         right: 77px;
         border: 2px solid #999999; border-radius: 50px;
         transition: all 0.3s ease-in 0s;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
         margin-left: 0;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
         right: 0px;
        }
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
        .td{
          font-size: 150px;
        }
        .notification {
          background-color: #555;
          color: white;
          text-decoration: none;
          padding: 15px 26px;
          position: relative;
          display: inline-block;
          border-radius: 2px;
        }

        .notification:hover {
          background: red;
        }

        .notification .badge {
          position: absolute;
          top: -10px;
          right: -10px;
          padding: 5px 10px;
          border-radius: 50%;
          background: red;
          color: white;
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
    background-size: cover;background-color:#ffddcc">
      <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <div class="main showcase-page" style="background-color:#ffddcc;"><br>
        <section class="module-medium" id="demos">
          <br>
          <div align="right" style="margin-right: 20px">

          <span class="onoffswitch" style="text-align:right;">
              <b>
                <?php
                  $str=mysqli_query($conn,"SELECT * from shop where sh_id=".$_SESSION['id']);
                  $strf=mysqli_fetch_array($str);
                  if($strf['status']==1){
                    echo "On";
                  }
                  elseif($strf['status']==0) {
                    echo "Off";
                  }
                ?>
              </b>
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" style="background-color:#ffaa80">
              <?php include 'togg.php'?>
          </span>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <a href="currentorder.php" class="" >
            <i class="fa fa-bell fa-3x" aria-hidden="true" ></i>
            <span class="badge"><?php echo $_SESSION['pend']; ?></span>
          </a>
        </div>
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
          <br>
          <div class="container" style="background-color:#ffddcc;">
            <div class="row multi-columns-row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a class="content-box" style="margin-bottom: 0px; margin: 5px 0;" href="Balance.php">
                <div align="left" margin="10px" height="33.33%" spacing="10px">
                  <div class="content-box-image" style="height:150px;  position: relative; text-align: center; color: white;border-radius: 25px;">
                    <img src="assets/images/balance1.jpg" style="height:150px"><h3>
                      <div class="txt"><b>Balance :<?php
                      if(!isset($_SESSION['id'])){
                        echo "₹0";
                      }else {
                        echo ' ₹'.$daytot;}
                        ?><br>

                        <table >
                          <tr>
                            <!-- <td><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Commission : </td> -->
                            <!-- <td><h4>&nbsp;&nbsp;<?php echo $comm; ?></td> -->
                          </tr>
                        </table>
                        </b>
                      </div></h3>
                  <h3><?php  ?></h3>
                  </div>
                </div>
              </div>
               <?php
               $counp = 0;
               $counc = 0;
               $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id='".$o_idf['o_id']."'");
               $o_id=mysqli_query($conn,"SELECT * from order_delivery");

               while($o_idf=mysqli_fetch_array($o_id)){

                 while($sql=mysqli_fetch_array($que) AND $o_idf['o_id']==$sql['id']){ }
                 $ped = mysqli_query($conn,"SELECT * from order_shopkeeper where id='".$o_idf['o_id']."' AND sh_id='".$_SESSION['id']."'");
                 $pedf = mysqli_fetch_array($ped);

                 if($pedf['status']=="pending"){$counp = $counp + 1;echo $sql['id'];}
                elseif($pedf['status']=="complete")
                {$counc = $counc + 1; echo $sql['id']; }
              }

                if($_SESSION['pend'] == $counp || $counp <= $_SESSION['pend']){}
                else{
                  echo '<BODY onLoad="play()">';
                }
              ?>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a class="content-box" style="margin-bottom: 0px; margin: 5px 0;" href="currentorder.php">
                <div align="left" margin="10px" height="33.33%" spacing="10px">
                  <div class="content-box-image" style="height:150px;border-radius: 25px;">
                    <img src="assets/images/order.jpg" style="height:150px"><h3>
                      <div class="txt"><b>
                            &nbsp;&nbsp;Orders : <?php echo $counp+$counc; ?></b>
                            <table >
                              <tr>
                                <td><h4 style="color:#ff6666"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pending : </b></td>
                                <td><h4 style="color:#ff6666"><b>&nbsp;&nbsp;<?php echo $counp;
                                $_SESSION['pend']=$counp;?></b></td>
                              </tr>
                              <tr>
                                <td><h4 style="color:#00ff00"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Completed : </b></td>
                                <td><h4 style="color:#00ff00"><b>&nbsp;&nbsp;<?php echo $counc; ?></b></td>
                              </tr>
                            </table>
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
