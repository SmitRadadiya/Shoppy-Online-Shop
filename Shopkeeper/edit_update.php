<?php
session_start();
include 'connection.php';

ini_set('display_errors','off')
 ?>
<?php
$iid=$_POST['iid'];
$price=$_POST['Price'];
// $que=mysqli_query($conn,"SELECT * FROM prod_list where pl_id='".$plid."'");
// $quef=mysqli_fetch_array($que);
$upd="UPDATE `items` SET `price`=$price WHERE i_id='$iid'";
if($price=='' || $iid==''){
}
else{
  mysqli_query($conn,$upd);
}
header("Location: itm.php");
?>
