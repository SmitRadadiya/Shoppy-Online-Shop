<?php
$o_idd=$_GET['o_id'];
 ?>
 <?php
 session_start();
 ini_set("display_errors","off");

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
    <?php    include 'connection.php';
 include 'header.php'
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
  <?php
  function del($sum2){
           if($sum2>=1 && $sum2<=50){
            $delivery=20;
            return $delivery;
          }
          else if($sum2>=51 && $sum2<=100){
            $delivery=round(($sum2/10));
            return $delivery;

          }
          else if($sum2>=101 && $sum2<=150){
            $delivery=round(($sum2/15));
            return $delivery;
          }
          else if($sum2>=151 && $sum2<=500){
            $delivery=round(($sum2/20));
            return $delivery;
          }
          else{
            return 0;
          }
        }
  ?>

  <div>
			<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
			<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
			<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;background-color:#e0e0eb">
      <div class="main showcase-page" style="border-radius: 25px;background-color:#c1c1d7;"><br><br>
      <h3><b>&nbsp;&nbsp;&nbsp;&nbsp;Order Details:</b></h3>
      <table>
        <tr>
          <th>Serial No.</th>
          <th>Product</th>
          <th>Quantity</th>
        </tr>
        <?php
        $o_rat=mysqli_query($conn,"SELECT * from del_hist where o_id='".$o_idd."' ");
        $o_ratf=mysqli_fetch_array($o_rat);
        $count=1;
                $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id='$o_idd'");
                while($sql=mysqli_fetch_array($que)){
                $res=mysqli_query($conn,"SELECT * from prod_list where pl_id='".$sql['pl_id']."'");
                $resf=mysqli_fetch_array($res);
                $o_id=mysqli_query($conn,"SELECT * from order_delivery where o_id='".$o_idd."' ");
                $o_idf=mysqli_fetch_array($o_id);
                $str=mysqli_query($conn,"SELECT * from items where pl_id=".$sql['pl_id']." AND sh_id=".$sql['sh_id']."");
                $strff=mysqli_fetch_array($str);


              echo '<div class="main showcase-page">';
              echo '<div class="col-md-6 col-sm-6 col-xs-6">';
        ?>
        <tr>
          <td><?php echo $count; ?></td>
          <td><h4>
                <?php
                  echo $resf['pl_nm'];
                  echo '<br>'.$resf['descr'];
                  $t=(int)($strff['price']+($strff['price']*0.1));
                  $tot=$tot+(int)($strff['price']+($strff['price']*0.1));
                  echo '<br> ₹'.$t;
                ?></h4></td>
          <td><h4>
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
      <h4 align="center">Delivery Charge : ₹<?php  echo del($tot); ?>
        <br><hr>
      <hr>
      <h4 align="center">Total Price : ₹<?php echo $o_idf['eff_price']; ?>
        <br><hr>

			<!-- <div class="container"> -->
				<div class="w3-card-4" style="width:100%">
					<header class="w3-container w3-light-grey">

					</header>
					<?php if($o_ratf['o_status']=="complete"){?>
            <form action="<?php echo $_PHP_SELF; ?>" method="post">
              <div class="w3-container">
  					  <h5>Rating</h5>
              <?php
              $ratval = mysqli_query($conn,"SELECT rat FROM rating WHERE o_id=".$o_idd);
              $ratvalf = mysqli_fetch_array($ratval);
              // echo $ratvalf['rat'];
               ?>
  					<input id="input1" name="input1" class="rating rating-loading" value="<?php  echo $ratvalf['rat'];?>" data-min="0" data-max="5" data-step="0.5" data-size="x">
            <input type="submit" name="add">
    					<br/>
  					</div>
          </form>
          <?php }
          if(isset($_POST['add'])){
            $star=$_POST['input1'];
            $delid=mysqli_query($conn,"SELECT * from del_hist where o_id='".$o_idd."' ");
            $delidf=mysqli_fetch_array($delid);
            $oidd = $o_idd;
            $did = $delidf[d_id];
            $chk = mysqli_query($conn,"SELECT * FROM rating");
            while($chkf=mysqli_fetch_array($chk)){
              if($chkf['o_id']==$oidd){
                mysqli_query($conn,"UPDATE rating SET `rat`=".$star." WHERE o_id=".$oidd);
              }
            }
            mysqli_query($conn,"INSERT INTO rating (o_id, d_id, rat) VALUES(".$oidd.",".$did.",".$star.")");
          }
          ?>

      <!-- </div> -->

    </div>
  </body>
</div>
</html>
