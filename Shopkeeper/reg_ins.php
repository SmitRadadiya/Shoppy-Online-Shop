<?php
include 'connection.php';
?>
<?php
if (!$conn)
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

$sname=$_POST['name'];
$mnum=$_POST['phone_num'];
$mail=$_POST['s_mail'];
$shname=$_POST['sh_nm'];
$shtype=$_POST['dept_id'];
$shaddr=$_POST['addr'];
$pincode=$_POST['pincode'];
$spwd=$_POST['s_pwd'];
$cspwd=$_POST['s_cfm_pwd'];
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
// if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
//   echo "uploaded";
// }
if($sname == '' || $mnum == '' || $mail == '' || $shname == '' || $shtype == '' || $shaddr == '' || $pincode == '' || $spwd == '' || $cspwd == ''){}

else{

if ($spwd == $cspwd) {

$sql="INSERT INTO `shopkeepers`(`s_nm`, `s_pwd`, `phone_num`, `s_mail`) VALUES ('$sname','$spwd',$mnum,'$mail')";

$str="INSERT INTO `shop`(`sh_nm`, `addr`, `pincode`, `dept_id`,`img`) VALUES ('$shname','$shaddr',$pincode,$shtype,'".$pic."')";
// echo "inserted";
if(mysqli_query($conn,$sql) && mysqli_query($conn,$str)) {
  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
  }
  // $target_dir = "../User/assets/images/";
  // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  // if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
  //   echo "file add to user";
  // }
  // chdir("../");
  // $target_dirr = "User/assets/images/";
  $target_dirr = "C:/xampp/htdocs/Shoppy 15.0/User/assets/images/";
  // chdir($target_dir1);
  // echo getcwd();
  $target_filee = $target_dirr . basename($_FILES["fileToUpload"]["name"]);
  // echo $target_file1;
  // $imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  // if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file1)){
  //   echo "<br>file add to user";
  // }
  copy($target_file, $target_filee);
  header("Location:login.php");

    }
}
else {
  echo '<script type="text/javascript">';
  echo ' alert("Password doesnt match")';
  echo '</script>';
  //header('Location: register.php');
}
}}
?>
