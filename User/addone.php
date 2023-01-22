<?php
session_start();
ini_set('display_errors','off');
include 'connection.php';

 ?>
<?php
$c= $_GET['count'];
$l = $_GET['location'];
$l=$l+2;

$get_pl_id = mysqli_query($conn,"SELECT pl_id from prod_list where pl_nm='".$_SESSION['cart'][$j+0]."'") or die("d1");

$pl_id = mysqli_fetch_array($get_pl_id);
$ccount = mysqli_query($conn,"SELECT stock from items where sh_id='".$_SESSION['cart'][$j+3]."' AND pl_id='".$pl_id[0]."'") or die("dakh");
$ccount_f = mysqli_fetch_array($ccount);


if($ccount_f[0] >= ($c+1)){
  $_SESSION['cart'][$l]=$c+1;

 header("Location: apply_promo.php");
}
else {
  echo '<script type="text/javascript">';
  echo ' alert("No more items available")';
  echo '</script>';
 header("Location: apply_promo.php");
}




 ?>
