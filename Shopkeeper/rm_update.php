<?php
session_start();
include 'connection.php';

ini_set('display_errors','off')
 ?>
<?php
$iid=$_POST['iid'];
$upd="DELETE FROM `items` WHERE i_id='$iid'";
if($iid=''){
}
else{
  mysqli_query($conn,$upd);
}
header("Location: itm.php");
?>
