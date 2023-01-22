<?php
      session_start();
      ini_set("display_errors","off");
      include 'connection.php';

      if(isset($_POST['submit'])){
        $upd=mysqli_query($conn,"UPDATE shop SET addr='".$_POST['addrss']."' where sh_id=".$_SESSION['id']);
        $upd1=mysqli_query($conn,"UPDATE shop SET pincode=".$_POST['pincode']." where sh_id=".$_SESSION['id']);
        header("Location: add.php");
      }
?>
