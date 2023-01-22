<?php
$o_idd=$_GET['o_id'];
 ?>
 <?php
 session_start();
 ini_set('display_errors','off');
 if(!isset($_SESSION['email'])){
   echo '<script type="text/javascript">';
   echo 'alert("Please Login first")';
   echo '</script>';
   header("refresh: 0.05; url = login.php");
 }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shoppy</title>
    <?php include 'navigationbar.php';
    include 'connection.php';
 ?>
    <style media="screen">
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th {
      color: #fff;
      background-color: #666;
    }
    th, td {
      text-align: center;
      padding: 8px;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tr{
      line-height: 14px;
    }
    </style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#ffddcc">
    <div class="main showcase-page" style="background-color:#ffa880;"><br><br>
      <h3><b style="color:#595959">&nbsp;&nbsp;&nbsp;&nbsp;Order Details:</b></h3>
      <table>
        <tr>
          <th>Serial No.</th>
          <th>Product</th>
          <th>Quantity</th>
        </tr>
        <?php
        $count=1;
            $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id='$o_idd' AND sh_id='".$_SESSION['id']."'");
            ?>
            <?php
            $bal=0;
            while($quef=mysqli_fetch_array($que)){

              $str=mysqli_query($conn,"SELECT * from items where pl_id=".$quef['pl_id']." AND sh_id=".$_SESSION['id']);
              while($strf=mysqli_fetch_array($str))
              {
                $bal+=$quef['quantity']*$strf['price'];
              }
            }
            $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id='$o_idd' AND sh_id='".$_SESSION['id']."'");
                while($sql=mysqli_fetch_array($que)){
                $res=mysqli_query($conn,"SELECT * from prod_list where pl_id='".$sql['pl_id']."'");
                $o_id=mysqli_query($conn,"SELECT * from order_delivery where o_id='".$o_idd."' ");
                $str=mysqli_query($conn,"SELECT * from items where pl_id=".$sql['pl_id']." AND sh_id=".$_SESSION['id']);
                $resf=mysqli_fetch_array($res);
                $o_idf=mysqli_fetch_array($o_id);
                $strff=mysqli_fetch_array($str);
              echo '<div class="main showcase-page">';
              echo '<div class="col-md-6 col-sm-6 col-xs-6">';
        ?>
        <tr>
          <td style="color:#595959"><?php echo $count; ?></td>
          <td><h4 style="color:#595959">
                <?php
                  echo $resf['pl_nm'];
                  echo '<br>'.$resf['descr'];
                  echo '<br> ₹'.$strff['price'];
                ?></h4></td>
          <td><h4 style="color:#595959">
              <?php
                echo $sql['quantity'];
              ?></h4>
          </td>
        </tr>
      <?php
        $count++;
      }
      ?>
      </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <hr>
      <h3 align="center"><b style="color:#595959">Total Price :<?php echo $bal; ?></b>
        <br><hr>
      <form action="currentorder.php?o_iddd=<?php echo $o_idd; ?>" method="post">
        <h4><input type="submit" name="submit" value="Order Prepared" align="center" style="border-radius: 8px;background-color:#ffaa80;border:none;"></h4></h3>
      </form>
    </div>
  </body>
</html>
