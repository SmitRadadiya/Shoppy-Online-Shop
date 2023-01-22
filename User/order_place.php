<?php
session_start();

ini_set("display_errors","off");
//echo $_SESSION['effective'];

//echo print_r($_SESSION['cart']);

include 'connection.php';

$max_str="SELECT max(id) FROM order_shopkeeper";
$mmm=mysqli_query($conn,$max_str);
while ($data=mysqli_fetch_array($mmm)) {
$abs=$data[0]+1;

}
$random_number1=rand(100000,999999);
$temp=array();
$temp_otp=array();


for($i=0,$j=0 ; $i<count($_SESSION['cart'])/4; $i++,$j=$j+4){
  $cmp = $_SESSION['cart'][$j];
  if($cmp != "0"){
  $sss="SELECT * FROM prod_list WHERE pl_nm='".$_SESSION['cart'][$j]."'";

  $sql=mysqli_query($conn,$sss);
  while($data=mysqli_fetch_array($sql))
  {
     $pl_id=$data["pl_id"];
  }

  if(in_array($_SESSION['cart'][$j+3],$temp)){
    $index = array_search($_SESSION['cart'][$j+3],$temp);
    $random_number1 = $temp_otp[$index];
  }
  else{
    $random_number1=rand(100000,999999);
    $temp[] = $_SESSION['cart'][$j+3];
    $temp_otp[] = $random_number1;
  }

  $str="INSERT INTO `order_shopkeeper` (`id`, `c_id`, `sh_id`,`s_otp`, `pl_id`,`quantity`, `status`) VALUES (".$abs.",".$_SESSION['id'].",".$_SESSION['cart'][$j+3].",".$random_number1.",".$pl_id.",".$_SESSION['cart'][$j+2].",'pending') ";
  mysqli_query($conn,$str);


    if($i==0)
    {
      $random_number=rand(100000,999999);
      $a1="INSERT INTO `order_delivery`  (`c_id`,`del_addr`,`eff_price`,`c_otp`,`pay_method`,`pincode`) VALUES (".$_SESSION['id'].",'".$_SESSION['address']."',".$_SESSION['effective'].",".$random_number.",'cod',".$_SESSION['d_pincode'].")";
      //echo $a1;
      mysqli_query($conn,$a1);

    }
  
    $ccount = mysqli_query($conn,"SELECT stock from items where sh_id='".$_SESSION['cart'][$j+3]."' AND pl_id='".$pl_id."'");
    $ccount_f = mysqli_fetch_array($ccount);
    $total_stock = $ccount_f[0] - $_SESSION['cart'][$j+2];

    $decrease_count = mysqli_query($conn,"UPDATE items SET stock='".$total_stock."' where sh_id='".$_SESSION['cart'][$j+3]."' AND pl_id='".$pl_id."'");


  }
}
    echo '<script type="text/javascript">';
    echo ' alert("Order place Successfully")';
    echo '</script>';
    unset($_SESSION['sum']);
    unset($_SESSION['promo']);
    $_SESSION['cart']=array();
 header("Location: index.php");
?>

<?php

$met=mysqli_query($conn,"SELECT pay_method from order_delivery where o_id=".$abs);
$metf=mysqli_fetch_array($met);

$setdel=mysqli_query($conn,"SELECT * from set_del where d_status=1 ORDER BY `datetime`");

while($setdelf=mysqli_fetch_array($setdel)){
    if($metf['pay_method']=='cod'){
      if($setdelf['depo_avail']>$_SESSION['effective']){
        $st = 0;
        $temp=$setdelf['depo_avail']-$_SESSION['effective'];
        mysqli_query($conn,"INSERT INTO del_hist VALUES (".$abs.",".$setdelf['d_id'].",'pending')");
        mysqli_query($conn,"UPDATE set_del SET `d_status`=".$st." WHERE d_id=".$setdelf['d_id']);
        mysqli_query($conn,"UPDATE set_del SET `depo_avail`=".$temp." WHERE d_id=".$setdelf['d_id']);
        break;
      }
    }
    else {
      $st = 0;
      mysqli_query($conn,"INSERT INTO del_hist VALUES (".$abs.",".$setdelf['d_id'].",'pending')");
      mysqli_query($conn,"UPDATE set_del SET `d_status`=".$st." WHERE d_id=".$setdelf['d_id']);
      break;
    }
}
$cb=mysqli_query($conn,"UPDATE order_delivery SET cashback=".$_SESSION['cashback']." WHERE o_id=".$abs);

$wal=mysqli_query($conn,"SELECT wallet from customers where c_id=".$_SESSION['id']);
$walf=mysqli_fetch_array($wal);

$bal=$walf['wallet']+$_SESSION['cashback'];
$cb=mysqli_query($conn,"UPDATE customers SET wallet=".$bal." where c_id=".$_SESSION['id']);
 ?>
