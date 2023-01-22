<?php
session_start();
 ?>
<?php
ini_set('display_errors','off');

if(isset($_SESSION['email']))
{
    if($_SESSION['temp']==1)
    {
      $_SESSION["cart"] = Array();
      $_SESSION['temp']=0;
    }

    $a=$_GET['itemName'];
    $b=$_GET['price'];
    $c=$_GET['shop'];

    $flag=0;
    for($i=0;$_SESSION["cart"][$i]!='';$i++){
      if($_SESSION["cart"][$i]==$a){
        $flag=1;
      }
    }
    if($flag==0){array_push($_SESSION["cart"],$a,$b,1,$c);
      echo '<script type="text/javascript">';
      echo ' alert("Item added")';
      echo '</script>';}
    else{echo '<script type="text/javascript">';
         echo ' alert("Item already added")';
         echo '</script>';}


   header("refresh: 0.5; url = item.php?shop=".$c."&item=".$a);

}
else {
  echo '<script type="text/javascript">';
  echo ' alert("Please login first...")';
  echo '</script>';
  header("refresh: 0.5; url = login.php");
}
 ?>
