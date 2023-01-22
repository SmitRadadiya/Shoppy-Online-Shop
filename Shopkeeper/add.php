<!DOCTYPE html>
<?php session_start();
ini_set("display_errors","OFF");
      ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#ffddcc;">
    <?php include 'navigationbar.php';
    include 'connection.php';
 ?>
    <div class="main showcase-page" style="background-color:#ffddcc;">
    <?php
          $ad=mysqli_query($conn,"SELECT * from shop WHERE sh_id=".$_SESSION['id']);
          $adf=mysqli_fetch_array($ad);
          $dep=mysqli_query($conn,"SELECT * from dept WHERE dept_id=".$adf['dept_id']);
          $depf=mysqli_fetch_array($dep);
    ?>
    <br>
    <form action="update_addr.php" method="POST">
    <div class="content-box" style="margin:15px">
    <div class="content-box-image" style="border-radius: 25px;background-color:#ffaa80; margin-top:45px;" align="left">
       <br>
       <i class="glyphicon glyphicon-home" style="font-size:24px; margin-left:15px; padding:10px"> <b>Shop : <?php echo $adf['sh_nm']; ?></b></i>
       <h4 style="margin-left:75px; font-size:18px;">
         <div class="p-t-31 p-b-9">
          <span class="txt1 fnt">
           <?php echo '<br>Location :';?>
           <input type="text" name="addrss" style="border-radius: 10px;background-color:#ffddcc;border:none;" value="<?php echo ' '.$adf['addr']; ?>">
          </span>
					</div>
          <div class="p-t-31 p-b-9">
           <span class="txt1 fnt">
            <?php echo '<br>Pincode :&nbsp;';?>
            <input type="text" name="pincode" style="border-radius: 10px;background-color:#ffddcc;border:none;" value=" <?php echo $adf['pincode']; ?>">
           </span>
 					</div>
        </i></h4>
        <br><br>
        <h4 style="color:black;" align="center">
        <input type="submit" name="submit" value="Update" style="border-radius: 8px;color:#fff; background-color:black;border:none;">
    </div>
  </div>
  </form>
  </div>


  </body>
</html>
