<?php
  session_start();
  ini_set("display_errors","off");
  include 'connection.php';
  if(isset($_POST['submit'])){
    $upd=mysqli_query($conn,"UPDATE customers SET u_addr='".$_POST['addrss']."' where c_id=".$_SESSION['id']);
    $upd1=mysqli_query($conn,"UPDATE customers SET pincode=".$_POST['pincode']." where c_id=".$_SESSION['id']);
    header("Location: add.php");
  }
?>
