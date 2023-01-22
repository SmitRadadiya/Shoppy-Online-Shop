<?php
session_start();
ini_set("display_errors","off");

include 'connection.php';

$flag=0;
$shid = 0;
$deptid = 0;
$pid = 0;

if(isset($_SESSION['sum']))
{
  session_unset($_SESSION['sum']);
  session_unset($_SESSION['info']);
}
?>

<?php
$code=$_POST['code'];
$price=$_POST['price'];
$_SESSION['cashback']=0;


$str="SELECT * FROM discount WHERE code ='".$code."'";
$result=mysqli_query($conn,$str);
if(mysqli_num_rows($result)>0)
{
    while ($cb=mysqli_fetch_array($result)) {

      $p_discid = $cb['disc_id'];
      $p_shid = $cb['sh_id'];
      $p_deptid = $cb['dept_id'];
      $p_pid = $cb['p_id'];

  for($i=0,$j=0 ; $i<count($_SESSION['cart'])/4; $i++,$j=$j+4){
    $cmp = $_SESSION['cart'][$j+0];
    if($cmp != "0"){
      $shid = $_SESSION['cart'][$j+3];

      $sss="SELECT * FROM `shop` WHERE sh_id='".$shid."'";
      $deptid = 0;
        $sql=mysqli_query($conn,$sss);
        while($data=mysqli_fetch_array($sql)){
          echo $deptid=$data["dept_id"];
          echo "deptid";
          $shnm=$data["sh_nm"];

        }

      if($shid == $p_shid || $p_pid == 1 || $deptid == $p_deptid){
        $flag=1;
      }
      else{
        $flag=0;
        break;
      }
      }  echo "flag : ".$flag."<br>";
    }

if($flag==1){
  $_SESSION['cashback']=$_SESSION['cashback']+(($price * $cb['perc'])/100);
        $_SESSION['info']="Promocode applied";
  echo $_SESSION['cashback']."<br>";
        if($cb['min_rps'] < $price )
        {
          $_SESSION['cashback']=$_SESSION['cashback']+$cb['flat'];
          echo $_SESSION['cashback']."<br>";
        }
        else {
          $_SESSION['info']="Minimum cart amount is".$cb['min_rps'];
        }

        if((($price * $cb['upto'])/100) < $cb['min_rps'])
        {
          $_SESSION['cashback']=$_SESSION['cashback']+(($price * $cb['upto'])/100);
        }
        else {
          $_SESSION['cashback']=$_SESSION['cashback']+$cb['min_rps'];
        }
      }
      else{
        $_SESSION['info'] = "Discount is Not Applicable for Some Products or Shop or Department, Plz Check Again.";
      }

  }
$_SESSION['sum']=$price;

}
else {
  $_SESSION['sum']=$price;
  $_SESSION['info']="Invalid Promocode";
}
header("Location: cart1.php")
?>
