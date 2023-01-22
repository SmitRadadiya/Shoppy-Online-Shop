<br><br><br>
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

<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#ffddcc">
     <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>

    <div class="main showcase-page" style="background-color:#ffddcc;">
    <?php

      $day = date('w');
      $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
      $week_end = date('Y-m-d', strtotime('+'.(7-$day).' days'));
      $today_date = date('Y-m-d',strtotime("now"));
      //echo $week_start;
      //echo $week_end;
      $month_start = date("Y-m-d", strtotime("first day of this month"));
      $month_end = date("Y-m-d", strtotime("last day of this month"));

      $lmonth_start = date("Y-m-d", strtotime("first day of last month"));
      $lmonth_end = date("Y-m-d", strtotime("last day of last month"));

      $str0="select * from balance where sh_id=".$_SESSION['id'];
      //$str1="select * from balance where dt>='".$week_start."' AND dt<='".$week_end."' AND sh_id=".$_SESSION['id'];
      $str1="select * from balance where dt>='".$week_start."' AND dt<'".$week_end."' AND sh_id=".$_SESSION['id'];
      $str2="select * from balance where dt>='".$month_start."' AND dt<='".$month_end."' AND sh_id=".$_SESSION['id'];
      $str3="select * from balance where dt>='".$lmonth_start."' AND dt<='".$lmonth_end."' AND sh_id=".$_SESSION['id'];

      $result0=mysqli_query($conn,$str0);
      $result1=mysqli_query($conn,$str1);
      $result2=mysqli_query($conn,$str2);
      $result3=mysqli_query($conn,$str3);

      $allcomm=0;
      while($rows0 = mysqli_fetch_array($result0))
      {
        $allcomm += $rows0['curr_bal'];
      }

      $weektotal=0;
      $weekcomm=0;
      while($rows1 = mysqli_fetch_array($result1))
      {
        $weektotal += $rows1['curr_bal'];
        $weekcomm += $rows1['comm'];
      }

      $monthtotal=0;
      $monthcomm=0;
      while($rows2 = mysqli_fetch_array($result2))
      {
        $monthtotal += $rows2['curr_bal'];
        $monthcomm += $rows2['comm'];
      }

      $lmtotal=0;
      $lmcomm=0;
      while($rows3 = mysqli_fetch_array($result3))
      {
        $lmtotal += $rows3['curr_bal'];
        $lmcomm += $rows3['comm'];
      }
      ?>
      <h3><b>&nbsp;&nbsp;&nbsp;&nbsp;Your Total Earning :</b>
        <?php
        echo ' <b>₹'.$allcomm;
        echo "</b>";
        ?>
      </h3>
      <section class="module-medium" id="demos">
        <div class="container">
          <div class="row multi-columns-row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <a class="content-box" style="margin-bottom: 0px; margin: 5px 0;">
                <div align="left" margin="10px" height="33.33%" spacing="10px">
                  <div class="content-box-image" style="height:150px;border-radius: 25px;background-color:#ffaa80;">
                    <h3 style="color:#595959">
                      &nbsp;&nbsp;&nbsp;&nbsp;This Week's :
                      <table >
                              <tr>
                                <td><h4 style="color:#595959">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Balance : </td>
                                <td><h4 style="color:#595959">&nbsp;&nbsp;<?php echo ' ₹'.$weektotal; ?></td>
                              </tr>
                              <!-- <tr>
                                <td><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Commission : </td>
                                <td><h4>&nbsp;&nbsp;<?php //echo ' ₹'.$weekcomm; ?></td>
                              </tr> -->
                    </table>
                  </h3>
                </div>
              </div>
            </div>
    <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" style="margin-bottom: 0px; margin: 5px 0;">
      <div align="left" margin="10px" height="33.33%" spacing="10px">
        <div class="content-box-image" style="height:150px;border-radius: 25px;background-color:#ffaa80;">
          <h3 style="color:#595959">
              &nbsp;&nbsp;&nbsp;&nbsp;This Month :
              <table >
                        <tr>
                          <td><h4 style="color:#595959">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Balance : </td>
                          <td><h4 style="color:#595959">&nbsp;&nbsp;<?php echo ' ₹'.$monthtotal; ?></td>
                        </tr>
                        <!-- <tr>
                          <td><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Commission : </td>
                          <td><h4>&nbsp;&nbsp;<?php //echo ' ₹'.$monthcomm; ?></td>
                        </tr> -->
              </table>
                </h3>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" style="margin-bottom: 0px; margin: 5px 0;">
      <div align="left" margin="10px" height="33.33%" spacing="10px">
        <div class="content-box-image" style="height:150px;border-radius: 25px;background-color:#ffaa80;">
          <h3 style="color:#595959">
                  &nbsp;&nbsp;&nbsp;&nbsp;Last Month :
                  <table >
                            <tr>
                              <td><h4 style="color:#595959">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Balance : </td>
                              <td><h4 style="color:#595959">&nbsp;&nbsp;<?php echo ' ₹'.$lmtotal; ?></td>
                            </tr>
                            <!-- <tr>
                              <td><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Commission : </td>
                              <td><h4>&nbsp;&nbsp;<?php //echo ' ₹'.$lmcomm; ?></td>
                            </tr> -->
                  </table>
                </h3>
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
