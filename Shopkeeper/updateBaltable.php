<?php
  session_start();
  ini_set('display_errors','off');

  include 'connection.php';

  $day = date('w');
  $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
  $week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
  $today_date = date('Y-m-d',strtotime("now"));

  $month_start = date("Y-m-d", strtotime("first day of this month"));
  $month_end = date("Y-m-d", strtotime("last day of this month"));

  $lmonth_start = date("Y-m-d", strtotime("first day of last month"));
  $lmonth_end = date("Y-m-d", strtotime("last day of last month"));

  $str="select * from order_shopkeeper where order_date='".$today_date."' AND status='complete' AND sh_id=".$_SESSION['id'];
  $res=mysqli_query($conn,$str);
  while($ans=mysqli_fetch_array($res))
  { //echo $ans['quantity'];
    $bal=0;
    $que="select * from items where sh_id=".$_SESSION['id']." AND pl_id=".$ans['pl_id'];
    $eq=mysqli_query($conn,$que);
    while($ans1=mysqli_fetch_array($eq))
    {
      //echo $ans1['price'].'<br>';
      $bal+=$ans['quantity']*$ans1['price'];
      $comm=$bal*0.1;

      $max_str="SELECT max(b_id) FROM balance";
      $mmm=mysqli_query($conn,$max_str);
      while ($data=mysqli_fetch_array($mmm)) {
      $abs=$data[0]+1;
      }

      $str1="INSERT INTO `balance` (`b_id`, `sh_id`, `curr_bal`) VALUES (".$abs.",".$_SESSION['id'].",".$bal.") ";
      $que1=mysqli_query($conn,$str1);
    }
  }

  header("refresh: 0.05; url = Balance.php");
?>
