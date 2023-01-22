<?php
$o_iid=$_POST['o_id'];


$update=mysqli_query($conn,"UPDATE order_shopkeeper SET status='Order Prepered' WHERE id='".$o_iid."' AND sh_id='".$_SESSION['id']."'");
if($update){
  $setdel=mysqli_query($conn,"SELECT * from set_del where d_status=1 ORDER BY `datetime`");
  while($setdelf=mysqli_fetch_array($setdel)){
      if($metf['pay_method']=='cod'){
        if($setdelf['depo_avail']>$metf['eff_price']){
          $st = 0;
          $temp=$setdelf['depo_avail']-$_SESSION['effective'];
          mysqli_query($conn,"INSERT INTO del_hist VALUES (".$o_iid.",".$setdelf['d_id'].",'pending')");
          mysqli_query($conn,"UPDATE set_del SET `d_status`=".$st." WHERE d_id=".$setdelf['d_id']);
          mysqli_query($conn,"UPDATE set_del SET `depo_avail`=".$temp." WHERE d_id=".$setdelf['d_id']);
          break;
        }
      }
      else {
        $st = 0;
        mysqli_query($conn,"INSERT INTO del_hist VALUES (".$o_iid.",".$setdelf['d_id'].",'pending')");
        mysqli_query($conn,"UPDATE set_del SET `d_status`=".$st." WHERE d_id=".$setdelf['d_id']);
        break;
      }
  }
}
 ?>
