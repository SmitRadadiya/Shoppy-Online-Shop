<?php
session_start();
include 'connection.php';

if(isset($_POST['checkbox'])) {
	$str="UPDATE shop SET status='1' WHERE sh_id ='".$_SESSION['id']."'";
	$result=mysqli_query($conn,$str);
	} else {
$str="UPDATE shop SET status='0' WHERE sh_id ='".$_SESSION['id']."'";
$result=mysqli_query($conn,$str);
}
header("Location: index.php");
?>
