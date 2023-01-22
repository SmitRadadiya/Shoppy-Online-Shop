<?php
ini_set("display_errors","off");
include 'connection.php';
?>
<?php
if (!$conn)
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
$name=$_POST['name'];
$mob=$_POST['mob'];
$email=$_POST['email'];
$add=$_POST['add'];
$pin=$_POST['pin'];
$pass=$_POST['pass'];
$cpass=$_POST['cnfpass'];
$target_dir = "assets/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$pic=basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
echo '<br>';
echo $pic;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo '<br>';
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

// if everything is ok, try to upload file
} else {
if($name== '' || $pass== '' || $email== '' || $mob== '' || $add== '' || $pin== '' || $cpass== ''){}
else
{
  if ($pass == $cpass) {
   $sql="INSERT INTO `customers`( `c_nm`, `c_pwd`, `c_mail`, `c_phone_num`, `u_addr`, `pincode`, `c_img`) VALUES ('$name','$pass','$email','$mob','$add','$pin','".$pic."')";
   if(mysqli_query($conn,$sql)){
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
    }
         header("Location: login.php");
       }
 }
 else {
   echo '<script type="text/javascript">';
   echo ' alert("Password doesnt match")';
   echo '</script>';
   //header('Location: register.php');
 }
}
}
?>
