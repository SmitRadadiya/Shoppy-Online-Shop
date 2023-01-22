<?php
$nm=$_POST['username'];
$pwd=$_POST['pass'];

include 'connection.php';
$str="SELECT * FROM customers WHERE c_mail ='".$nm."' AND c_pwd='".$pwd."'";
$result=mysqli_query($conn,$str);

if(mysqli_num_rows($result) == 0)
{
echo '<script type="text/javascript">';
echo "afdesrgvsd";?>
 <div class="alert alert-success" role="alert">Username or password is invalid</div>;
<?php
echo '</script>';
header("Location: login.php");
}
else
{
  session_start();
  while($data=mysqli_fetch_array($result))
  {
    $_SESSION['email']=$data['c_mail'];
    $_SESSION['name']=$data['c_nm'];
    $_SESSION['id']=$data['c_id'];
    $_SESSION['temp']=1;
  }

  // enter above line in all pages
  echo '<script type="text/javascript">';
  echo ' alert("Login is Success")';
  echo '</script>';
  echo "succes";

  //echo $_SERVER['HTTP_REFERER'];
  header("Location: index.php");
//echo "<script language=javascript> javascript:history.back(1);</script>";
}
?>
