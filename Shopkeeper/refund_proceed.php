<?php
session_start();
include 'connection.php';
include 'header.php';

if($_POST['refund']=="Return"){

  $o_id = $_GET['o_id'];

  $sql=mysqli_query($conn,"SELECT * FROM order_shopkeeper where o_id=".$o_id);
  mysqli_query($conn,"UPDATE balance SET curr_bal=0 where o_id=".$o_id);
$sum=0;
while($sqlf=mysqli_fetch_array($sql)){
  $sql1=mysqli_query($conn,"SELECT * FROM items where sh_id=".$sqlf['sh_id']." AND pl_id =".$sqlf['pl_id']);

  $sql1f=mysqli_fetch_array($sql1);

  $sum = $sum + $sql1f['price'];

}
$perc_sum= $sum*0.7;
$sql2=mysqli_query($conn,"SELECT * FROM del_hist where o_id=".$o_id);
$sql2f=mysqli_fetch_array($sql2);

$sql3=mysqli_query($conn,"SELECT d_balance FROM delivery where d_id=".$sql2f['d_id']);
$sql3f = mysqli_fetch_array($sql3);
$perc_sum = $perc_sum + $sql3f[0];
mysqli_query($conn,"UPDATE delivery SET d_balance=$perc_sum where d_id=".$sql2f['d_id']);


$sq=mysqli_query($conn,"SELECT eff_price FROM order_delivery where o_id=".$o_id);
$sqf=mysqli_fetch_array($sq);


$sq1=mysqli_query($conn,"SELECT * FROM set_del where d_id=".$sql2f['d_id']);
$sq1f=mysqli_fetch_array($sq1);

if($sq1f['refund']==0){
    mysqli_query($conn,"UPDATE set_del SET refund=1 where d_id=".$sql2f['d_id']);
    $ttt = $sqf[0] + $sq1f['depo_avail'];
    mysqli_query($conn,"UPDATE set_del SET depo_avail=".$ttt." where d_id=".$sql2f['d_id']);

}
  mysqli_query($conn,"UPDATE order_shopkeeper SET status='refunded' where sh_id=".$_SESSION['id']." AND id=".$o_id);
}
header("Location: corder.php");
