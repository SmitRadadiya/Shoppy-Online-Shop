<?php
include 'connection.php';

$s_nm = $_POST['s_nm'];
$s_mail = $_POST['s_mail'];
$phone_num = $_POST['phone_num'];
$sh_nm = $_POST['sh_nm'];
$addr = $_POST['addr'];
$dept_id = $_POST['dept_id'];
$pincode = $_POST['pincode'];
$s_pwd= $_POST['s_pwd'];
$s_cfm_pwd= $_POST['s_cfm_pwd'];


if($s_pwdd!=$s_cnf_pwd)
echo '<script type="text/javascript">';
echo ' alert("password does not match")';
echo '</script>';
else{

  $str="INSERT INTO shopkeepers(s_nm, s_pwd, phone_num, s_mail) VALUES ('".$s_nm."','".$s_pwd."','".$phone_num."','".$s_mail."')";
  $result=mysqli_query($conn,$str);

  $str="INSERT INTO shop(sh_nm, addr, pincode, dept_id) VALUES ('".$sh_nm."','".$addr."','".$pincode."','".$dept_id."')";
  $result=mysqli_query($conn,$str);
}


  session_start();
  while($data=mysqli_fetch_array($result))
  {
    $_SESSION['email']=$data['s_mail'];
    $_SESSION['name']=$data['s_nm'];
    $_SESSION['id']=$data['sh_id'];
    $_SESSION['temp']=1;
  }

  echo '<script type="text/javascript">';
  echo ' alert("Successfully signed up")';
  echo '</script>';
  echo "succes";

  // echo $_SERVER['HTTP_REFERER'];
  header("Location: index.php");
  // echo "<script language=javascript> javascript:history.back(1);</script>";
}

?>
