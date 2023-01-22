<?php
      session_start();
      ini_set("display_errors","off");
      include 'connection.php';

      if(isset($_POST['submit'])){
        $upd=mysqli_query($conn,"UPDATE shopkeepers SET s_nm='".$_POST['fnm']."' where sh_id=".$_SESSION['id']);
        $upd1=mysqli_query($conn,"UPDATE shopkeepers SET s_mail='".$_POST['email']."' where sh_id=".$_SESSION['id']);
        $upd=mysqli_query($conn,"UPDATE shopkeepers SET s_pwd='".$_POST['pwd']."' where sh_id=".$_SESSION['id']);
        $upd=mysqli_query($conn,"UPDATE shopkeepers SET phone_num=".$_POST['num']." where sh_id=".$_SESSION['id']);
        header("Location: account.php");
      }
?>
