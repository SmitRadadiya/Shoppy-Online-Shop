<?php
session_start();
ini_set('display_errors','off');
include 'connection.php';

 ?>
<?php
$plid=$_POST['plid'];
$price=$_POST['Price'];
$que=mysqli_query($conn,"SELECT * FROM prod_list where pl_id='".$plid."'");
$quef=mysqli_fetch_array($que);
$ins="INSERT INTO `items`(`pl_id`, `sh_id`, `price`, `stock`) VALUES ('$plid','".$_SESSION['id']."','$price',1)";
if($price==0 || $plid==' '){
}
else{
  mysqli_query($conn,$ins);
}
header("Location: itm.php");
?>
