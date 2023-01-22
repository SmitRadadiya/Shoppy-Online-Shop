<?php
include 'connection.php';

$mail=$_POST['smail'];
$pwd=$_POST['spwd'];

$str="SELECT * FROM shopkeepers WHERE s_mail ='".$mail."' AND s_pwd='".$pwd."'";
$result=mysqli_query($conn,$str);

$data=mysqli_fetch_array($result);

if(mysqli_num_rows($result) == 0)
{
  echo '<script type="text/javascript">';
  echo ' alert("Username or password is invalid")';
  echo '</script>';
  header("Location: login.php");
}
else
{
  session_start();

  $_SESSION['email']=$data['s_mail'];
  $_SESSION['id']=$data['sh_id'];
  $_SESSION['type']=$data['dept_id'];

  // enter above line in all pages
  echo '<script type="text/javascript">';
  echo ' alert("Login is Success")';
  echo '</script>';
  echo "success";

  //echo $_SERVER['HTTP_REFERER'];
  header("Location: index.php");
//echo "<script language=javascript> javascript:history.back(1);</script>";
}
?>
