<?php
$query=mysqli_connect(“localhost”,”root”,””,"abc");

if(isset($_POST[‘value’]))
{
$value=$_POST[‘value’];
mysqli_query(“update togal set choice=’$value’ where id='1'”);
echo “<h2>You have Chosen the button status as:” .$value.”</h2>”;
}
?>
