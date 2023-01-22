<?php
      session_start();
      ini_set("display_errors","off");
      include 'connection.php';

      if(isset($_POST['submit'])){
        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $pic=basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        echo '<br>';
        echo $pic;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        echo '<br>';
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){}
          if($pic){
        mysqli_query($conn,"UPDATE customers SET c_img='$pic' where c_id=".$_SESSION['id']);
      }
        mysqli_query($conn,"UPDATE customers SET c_nm='".$_POST['c_nm']."' where c_id=".$_SESSION['id']);
        mysqli_query($conn,"UPDATE customers SET c_mail='".$_POST['c_mail']."' where c_id=".$_SESSION['id']);
        mysqli_query($conn,"UPDATE customers SET c_pwd='".$_POST['c_pwd']."' where c_id=".$_SESSION['id']);
        mysqli_query($conn,"UPDATE customers SET c_phone_num=".$_POST['c_phone_num']." where c_id=".$_SESSION['id']);
        header("Location: account.php");
      }
?>
