<?php
session_start();
$_SESSION["store_sum"]=0;
ini_set('display_errors','off');
include 'connection.php';
if(isset($_SESSION['email']))
{

  if(count($_SESSION['cart'])<=0)
  {
    //$delivery=0;
    echo '<script type="text/javascript">';
    echo ' alert("Your cart is empty...")';
    echo '</script>';
    header("refresh: 0.5; url = index.php");
  }

}
else {
  echo '<script type="text/javascript">';
  echo ' alert("Please login first...")';
  echo '</script>';
  header("refresh: 0.5; url = login.php");
}
 ?>

<!-- <!DOCTYPE html> -->
<html lang="en-US" dir="ltr">
	<head>
		<title>Shoppy</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--
    Stylesheets
    =============================================

    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
	</head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#e0e0eb"><br><br><br>
    		<?php include 'header.php' ?>
		<div class="main showcase-page">
	<div class="main">
			<div class="container" style="background-color:#e0e0eb;">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<h1 class="module-title font-alt">Your Cart</h1>
					</div>
				</div>
				<!-- <hr class="divider-w pt-20"> -->
				<div class="row">
					<div class="col-sm-12">
						<table style="1px solid black;" class="table table-striped table-border checkout-table" >
							<body>
								<tr>
									<th class="hidden-xs">Item</th>
									<th>Description</th>
									<th class="hidden-xs">Price</th>
									<th>Quantity</th>
									<th>Total</th>

								</tr>
								<?php

// $_SESSION['cart'] array = [ITEM NAME, ITEM PRICE, ITEM QUANTITY, ITEM TOTAL] --  THIS REPEAT FOR ALL ITEMS
								for($i=0,$j=0 ; $i<count($_SESSION['cart'])/4; $i++,$j=$j+4)
								{
                  $cmp = $_SESSION['cart'][$j];
                  if($cmp != "0"){
                    $product_price = round($_SESSION['cart'][$j+1]+($_SESSION['cart'][$j+1]*0.1));
								echo '<tr>';
								  echo '<td class="hidden-xs"><a href="#"><img src="assets/images/pm.png'.$strf['pl_img'].'" alt=""/></a></td>';
								  echo '<td>';
								    echo '<h5 class="product-title font-alt">'.$_SESSION['cart'][$j].'</h5>';
								  echo '</td>';
								  echo '<td class="hidden-xs">';
								   echo '<h5 class="product-title font-alt">₹'.$product_price.'</h5>';
								  echo '</td>';
								  echo '<td>';
								   echo '<a href="subone.php?count='.$_SESSION["cart"][$j+2].'&location='.$j.'"><button type="button" style="font-size:16px"><b>-</b></button></a>';
									 echo  " ". $_SESSION["cart"][$j+2]. " ";
							echo '<a href="addone.php?count='.$_SESSION["cart"][$j+2].'&location='.$j.'"><button type="button" style="font-size:16px"><b>+</b></button></a>';
								  echo '</td>';
								  echo '<td>';
                  $_SESSION["store_sum"] = $_SESSION["store_sum"] + $product_price*$_SESSION['cart'][$j+2];
								    echo '<h5 class="product-title font-alt">₹'.$product_price*$_SESSION['cart'][$j+2].'</h5>';
								  echo '</td>';
								 // echo '<td class="pr-remove"><a href="#" title="Remove"><i class="fa fa-times"></i></a></td>';
								echo '</tr>';
                  }
							}
            //  echo print_r($_SESSION['cart']);
?>

							</body>
						</table>

					</div>
        <?php

        // for($item=0,$j=0 ; $item<count($_SESSION['cart'])/4 ; $item++,$j=$j+4)
        // {
        //   $sum = $sum +round($_SESSION['cart'][$j+1]*$_SESSION['cart'][$j+2]+($_SESSION['cart'][$j+1]*$_SESSION['cart'][$j+2]*.1));
        //
        // }
        $sum = $_SESSION["store_sum"];

        function del($sum2){
           if($sum2>=1 &&$sum2<=50){
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

        if(isset($_SESSION['sum']))
        {
          $sum2=$_SESSION['sum'];
          $delivery=del($sum2);
          $effective = $sum2 + $delivery;
        }
        else{
          $delivery=del($sum);
          $effective = $sum + $delivery;
        }
			echo 	'</div>';
        echo '<form action="apply_promo.php" method="post">';
				echo '<div class="row">';
				echo '<div class="col-sm-3">';
					echo 	'<div class="form-group">';
          echo 	'<input class="form-control" type="hidden" id="" name="price" value='.$sum.'>';
          if((isset($_SESSION['sum'])))
          {
            $CC= $_SESSION['promo'];
          }
          else {
            $CC= "COUPON CODE";
          }
						echo 	'<input class="form-control" type="text" id="" name="code" placeholder="'.$CC.'"/>';
					echo 	'</div>';
				echo	'</div>';
					echo '<div class="col-sm-3">';
				echo		'<div class="form-group">';
				echo	'<input  type="submit" name="submit"  value="Apply" class="btn btn-round btn-g">';
        if(isset($_SESSION['sum']))
        {

          echo "<br>".$_SESSION['info'];
          echo "<br>₹".$_SESSION['cashback']." will be received in wallet";
        }

				echo 		'</div>';
				echo '</div>';

			echo	'</div>';
      echo '</form>';
			echo	'<hr class="divider-w">';
			echo 	'<div class="row mt-70">';
			echo	'<div class="col-sm-5 col-sm-offset-7">';
			echo			'<div class="shop-Cart-totalbox">';
			echo		'<h4 class="font-alt">Cart Totals</h4>';
			echo		'<table class="table table-striped table-border checkout-table">';
			echo		'<tbody>';
				echo		'<tr>';
				echo		'<th>Cart Subtotal :</th>';
				echo		'<td>₹';

        if(isset($_SESSION['sum']))
        {
        echo $sum2;
      }
      else {
        echo $sum;
      }



                    echo '</td>';
									echo '</tr>';
									echo '<tr>';
										echo '<th>Shipping Total :</th>';
										echo '<td>₹'.$delivery.'</td>';
									echo '</tr>';
									echo '<tr class="shop-Cart-totalprice">';
										echo '<th>Total :</th>';
										echo '<td>₹'.$effective.'</td>';
									echo '</tr>';
                  $_SESSION['effective']=$effective;

                  ?>

								</tbody>
							</table>

              <form class="w3-container" action="payment.php" method="POST">
                <p>
                  <!-- <i class="glyphicon glyphicon-home" style="font-size:24px;margin-left:15px;padding:10px"> Home</i> -->

               <span class="glyphicon" style="margin:10px">&#xe021;</span>
                 <label>Delivery Address</label>
                 <?php
                 $id=$_SESSION['email'];

                 $que=mysqli_query($conn,"select * from customers where c_mail='$id'");

                 while($rows=mysqli_fetch_array($que))
                 {
                   $add=$rows['u_addr'];
                   $pinc=$rows['pincode'];
                 }
                 ?>

                <input class="w3-input" type="text" name="address" value="<?php echo $add; ?>"></p>
                  <input class="w3-input" type="text" name="pincode" placeholder="Pincode"  value="<?php echo $pinc; ?>"></p>
    							<input class="btn btn-lg btn-block btn-round btn-d" type="submit" name="submit" value="Proceed to Checkout">
                  </form>
          	</div>
					</div>
				</div>
			</div>
		<!-- </section> -->

</div>

</main>

	</body>
</html>
