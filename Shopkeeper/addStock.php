<?php

session_start();
ini_set('display_errors','off');
include 'connection.php';


$sh_id = $_POST["sh_id"];
$pl_id = $_POST["pl_id"];

if($_POST["count"]>0)
{
  if($_POST["add"]=="Add"){

    $total_stock =  $_POST["count"] + $_POST["cstock"];

    $sql = mysqli_query($conn,"UPDATE items SET stock='".$total_stock."' where sh_id='".$_SESSION['id']."' AND pl_id='".$pl_id."'");
    mysqli_fetch_array($sql);
  }
  else {

    $total_stock =  $_POST["cstock"] - $_POST["count"];

    if($total_stock<0){
      $total_stock=0;
    }
    $sql = mysqli_query($conn,"UPDATE items SET stock='".$total_stock."' where sh_id='".$_SESSION['id']."' AND pl_id='".$pl_id."'");
    mysqli_fetch_array($sql);
  }


  header("Location: itm.php");
}
else {
  echo '<script type="text/javascript">';
  echo 'alert("Item must be greater then 1")';
  echo '</script>';
  header("refresh: 0.05; url = itm.php");
}

 ?>
