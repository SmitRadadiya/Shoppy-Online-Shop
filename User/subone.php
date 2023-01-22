
<?php
session_start();
 ?>

 <?php
$c= $_GET['count'];
$l = $_GET['location'];

if (($c-1) <= 0 )
{
  if($l==0)
  {
    array_splice($_SESSION["cart"],$l,$l+4);
  }
  else{
    $_SESSION["cart"][$l] = "0";
    $_SESSION["cart"][$l+1] = 0;
  }

  if(count($_SESSION['cart'])<=1)
  {
    $_SESSION['cart']=array();
  }
}
else {

$l=$l+2;
$_SESSION['cart'][$l]=$c-1;
//echo $_SESSION['cart'][$l];
}
if(count($_SESSION['cart']) <= 0 )
{
  echo '<script type="text/javascript">';
  echo ' alert("Your cart is empty...")';
  echo '</script>';
  print_r($_SESSION["cart"]);
  header("Location: index.php");
}
else {
  print_r($_SESSION["cart"]);
  header("Location: apply_promo.php");
}


 ?>
